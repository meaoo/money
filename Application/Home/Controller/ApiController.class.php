<?php

namespace Home\Controller;

class ApiController extends IndexController{

    function _initController(){

        //所有API操作 必须是POST请求
        if(!APP_DEBUG && !IS_POST){
            $this->show( L('access_illegal') );
            exit;
        }
    }

    /**
     * 根据父级ID，获取次级子分类
     * @param mixed 父级ID 
     * @param mixed 语言ID，0 表示不需要语言数据 
     * @param mixed 是否使用默认语言填充 
     */
    function getchildcats($topid, $langId = 0, $useDefaultLang = false){
        $categories  = getCategories($langId, $useDefaultLang);
        $cats = array();
        foreach($categories as $cat){
            if($cat['parent_id'] == $topid){
                array_push($cats, $cat);
            }
        }

        $result = new AjaxResult();
        $result->Result = true;
        $result->Message = '';
        $result->Data = $cats;

        $this->ajaxReturn($result);
    }

    function getchildareas($topid, $langId = 0, $useDefaultLang = false){
        $areas  = getAreas($langId, $useDefaultLang);
        $resultAreas = array();
        foreach($areas as $area){
            if($area['parent_id'] == $topid){
                array_push($resultAreas, $area);
            }
        }

        $result = new AjaxResult();
        $result->Result = true;
        $result->Message = '';
        $result->Data = $resultAreas;

        $this->ajaxReturn($result);
    }

    function upload($uploader){
        $result = new AjaxResult();
        $result->Result = false;
        $result->Message = '';
        $result->Data = '';
        $result->Name = '';

        if(!empty($_FILES[$uploader]['tmp_name'])){

            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 5 * 1024 * 1024; //设置附件上传大小
            $upload->exts = array('pdf', 'rtf', 'doc', 'odt','docx');// 设置附件上传类型
            $upload->rootPath = C('UPLOAD_PATH'); // 设置附件上传根目录
            $upload->savePath = ''; // 设置附件上传（子）目录
            $upload->subName = array('date','Ymd');

            $info = $upload->uploadOne($_FILES[$uploader]);
            if(!$info) {// 上传错误提示错误信息
                $result->Message=  '错误提示：' .$upload->getError();
            }else{
                $result->Data = $info['savepath'].$info['savename'];
                $result->Name = $info[ 'name' ];
                $result->Result=true;
            }
        }else{
            $result->Message= L('company_img_upload_empty');
        }
        $this->ajaxReturn($result);
    }

    function uploadfile($uploader){
        $result = [];
        $result['Result'] = false;
        $result['Message'] = '';
        $result['Data'] = '';

        if(!empty($_FILES[$uploader]['tmp_name'])){

            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 2 * 1024 * 1024; //设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg', 'doc', 'docx', 'pdf', 'zip', 'rar', 'txt');// 设置附件上传类型
            $upload->rootPath = C('UPLOAD_PATH'); // 设置附件上传根目录
            $upload->savePath = ''; // 设置附件上传（子）目录
            $upload->subName = array('date','Ymd');

            $info = $upload->uploadOne($_FILES[$uploader]);
            if(!$info) {// 上传错误提示错误信息
                $result['Message']=  L('company_img_upload_error') .'：' .$upload->getError();
            }else{
                $result['Data']['url'] = $info['savepath'].$info['savename'];
                $result['Data']['name'] = $info['name'];
                $result['Result']=true;
            }
        }else{
            $result['Message']= L('company_img_upload_empty');
        }


        $this->ajaxReturn($result);

    }


    /**
     * 收藏/取消收藏
     * @param mixed 标识，1:表示已收藏，进行取消收藏操作，0:表示没有收藏过，进行收藏操作 
     * @param mixed $cid 
     */
    function collect($flag, $cid){
        $result = new AjaxResult();
        $result->Result = false;
        $result->Message = '';
        $result->Data = '';

        if(!$this->islogin){
            $result->Message = L('need_login');
            $this->ajaxReturn($result);
            exit;
        }

        if($flag != 0 && $flag != 1){
            $result->Message = L('argument_error');
            $this->ajaxReturn($result);
            exit;
        }

        $company = M('Company')->find($cid);
        if(!$company){
            $result->Message = L('argument_error');
            $this->ajaxReturn($result);
            exit;
        }

        $collect = M('UserCollect')->where(array('user_id' => $this->user['id'], 'company_id' => $company['id']))->find();

        if($collect){ // 已经存在收藏关系
            if($flag == 0){
                $result->Result = true;
                $result->Message = L('collect_exist');
                $result->Data = array('flag' => 0, 'link' => L('link_collect'));
                $this->ajaxReturn($result);
                exit;
            }else{
                M('UserCollect')->where(array('user_id' => $this->user['id'], 'company_id' => $company['id']))->delete();
                
                computeCollectRank($this->user['id'], $company['id']);

                $result->Result = true;
                $result->Message = L('collect_cancel_success');
                $result->Data = array('flag' => 0, 'link' => L('link_collect'));
                $this->ajaxReturn($result);
                exit;

            }
        }else{ // 不存在收藏关系
            if($flag == 0){
                M('UserCollect')->add(array('user_id' => $this->user['id'], 'company_id' => $company['id'], 'addtime' => date('Y-m-d H:i:s') ));

                computeCollectRank($this->user['id'], $company['id']);

                $result->Result = true;
                $result->Message = L('collect_success');
                $result->Data = array('flag' => 1, 'link' => L('link_collect_cancel'));
                $this->ajaxReturn($result);
                exit;
            }else{                
                $result->Result = true;
                $result->Message = L('collect_noexist');
                $result->Data = array('flag' => 1, 'link' => L('link_collect_cancel'));
                $this->ajaxReturn($result);
                exit;
            }
        }

    }

    function feedback(){
        $type = I('type');
        $content = I('content');
        $contact = I('contact');
        $cid = I('cid');

        $result = new AjaxResult();
        $result->Result = false;
        $result->Message = '';
        $result->Data = '';


        if( empty($type) || empty($content) || empty($contact) ){
            $result->Message = L('argument_error');
            $this->ajaxReturn($result);
            exit;
        }

        $company = M('Company')->find($cid);
        if(!$company){
            $result->Message = L('argument_error');
            $this->ajaxReturn($result);
            exit;
        }

        M('Feedback')->add(array(
            'company_id' => $cid,
            'type' => $type,
            'content' => $content,
            'contact' => $contact,
            'addtime' => date('Y-m-d H:i:s'),
            'status' => 1,
            'user_id' => ($this->islogin ? $this->user['id'] : 0)
            ));

        $result->Result = true;
        $result->Message = L('feedback_tip_success');
        $this->ajaxReturn($result);

    }

    function readmsg($id){
        $msg = M('Message')->where('status = 1')->find($id);
        if($msg){
            $msg['status'] = 2;
            M('Message')->data($msg)->save();
        }
        $result = new AjaxResult();
        $result->Result = true;
        $result->Message = '';
        $result->Data = '';

        $this->ajaxReturn($result);
    }


    function checkname($name, $langId, $cid = 0){
        $name = trim($name);

        $result = new AjaxResult();
        $result->Result = true;
        $result->Message = '';
        $result->Data = '';

        $condition = array();
        $condition['name'] = array(
                    array('EQ', $name),
                    array('NEQ', '')
                );
        //$condition['language_id'] = $langId;
        if($cid && $cid != 0){
            $condition['company_id'] = array('neq',$cid);
        }

        $company = M('CompanyData')->where($condition)->find();
        if($company){
            $result->Data = U('index/company', array('id' => $company['company_id']));  //$company['company_id'];
        }

        $this->ajaxReturn($result);

    }

    function searchkey($key){
        $key = trim($key);

        $result = new AjaxResult();
        $result->Result = true;
        $result->Message = L('search_suggest_result');
        $result->Data = '';

        $condition['name'] = array('like', "%$key%");
        $condition['status'] = 1;
        $condition['company_count'] = array('GT', 0);
        $list = M('Tag')->where($condition)->limit(10)->field('name,language_id, company_count')->order('company_count desc')->select();

        $result->Data = $list;

        $this->ajaxReturn($result);
    }




    function tender_item(){
        
        $result = new AjaxResult();
        $result->Result = false;
        $result->Message = '';
        $result->Data = '';

        //$requestBody = $GLOBALS['HTTP_RAW_POST_DATA']; // 发现Thinkphp 框架获取不到这个值
        $requestData = $_POST;

        $data = json_decode( $requestData['data'], true);
        $singstr = implode('-', $data);
        $token = md5($singstr.'Oil.Tender');
        var_dump($data);exit();
        if($requestData['token'] != $token){
             $result->Message = 'Token验签不过';
             $this->ajaxReturn($result);

        }else{
        
            try{
                $data['trans_id'] = $data['id'];
                unset($data['id']);                
                $id = M('Titem')->add($data);
                $result->Result = true;
                $result->Message = $id;

            }catch(\Exception $e){
                
                $result->Message = $e->errorInfo[2];

            }

            $this->ajaxReturn($result);
        
        }
        
    }


    function tender_company(){
        
        $result = new AjaxResult();
        $result->Result = false;
        $result->Message = '';
        $result->Data = '';

        //$requestBody = $GLOBALS['HTTP_RAW_POST_DATA']; // 发现Thinkphp 框架获取不到这个值
        $requestData = $_POST;

        $data = json_decode( $requestData['data'], true);
        $singstr = implode('-', $data);
        $token = md5($singstr.'Oil.Tender');

        if($requestData['token'] != $token){
            $result->Message = 'Token验签不过';
            $this->ajaxReturn($result);

        }else{
            
            try{
                $id = 0;

                $exist = M('Tcompany')->find($data['id']);
                if($exist){
                    M('Tcompany')->save($data);
                    $id = -1;
                }else{
                    $id = M('Tcompany')->add($data);
                }
                $result->Result = true;
                $result->Message = $id;

            }
            catch(\Exception $e){
                
                $result->Message = $e->errorInfo[2];

            }
            //echo json_encode($result);die;
            $this->ajaxReturn($result);
            
        }
        
    }
    // 获取当天更新的求职条数！
   public function getjob(){
    //    本周更新条数
           if(IS_POST){
            $password=md5("job.oilsns.com");
            if($_POST['password']==$password){
            $model = M();
            $count = $model->query("select count(1) as count from `jobs` where is_active=1 and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(created_on);");
            $job['jobs.is_active']=1;
            $job['types.status']=0;
            $job['cities.status']=0;
            $job['categories.status']=0;
              $data=M('jobs')
             ->join('types ON jobs.type_id = types.id')
             ->join('cities ON jobs.city_id= cities.id')
             ->join('categories ON jobs.category_id=categories.id')
             ->where($job)
             ->limit(0,5)
             ->field('jobs.title,cities.name as city,jobs.company,jobs.year,jobs.id')
             ->order('jobs.id desc')
             ->select();
             $data['count']=$count[0]['count'];
             echo json_encode($data);
            }else{
                $text='参数错误';
                $data=array('text'=>$text);
                echo json_encode($data);
            }
           
           }else{
               $text='地址错误';
               $data=array('text'=>$text);
               echo json_encode($data);
           }
         
             
   }
	
	//日报职位信息
	function get_mail_jobs(){
		date_default_timezone_set("Asia/Shanghai");
		$yesterday = date("Y-m-d", strtotime("-1 day"));

		$yesterday_count = M('jobs')->where("is_active=1 and date_format(created_on,'%Y-%m-%d')='$yesterday'")->count();

		$jobs = M('jobs')->field('id,title,city_id')->where('is_active=1')->order('created_on desc')->limit('0,1')->select();

		$newjobs = array();

		if(is_array($jobs) && count($jobs) > 0){
			$newjobs = $jobs[0];
			$where['id'] = array('in', $newjobs['city_id']);
			$citys = M('cities')->field('name')->where($where)->select();
			if(is_array($citys) && count($citys) > 0){
				foreach($citys as $city){
					$newjobs['citys'] .= ($city['name'].',');
				}
				$newjobs['citys'] = trim($newjobs['citys'], ',');
			}
		}
		$result['yesterday'] = $yesterday_count;
		$result['newjobs'] = $newjobs;

		print_r(json_encode($result));
	}
    // 获取本周更新的职位信息
    public function getjobcount(){
       $count=M();
       $company=$count->query('select count(1) as count from `jobs` where is_active=1 and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(created_on)');
       print_r(json_encode($company));

    }
    public function getInfor(){
        $info=M('text')->find();
        $date=json_decode($info['date'],true);
        p($date);
    }
    public function curl(){
        $url = "http://tipask.pecans.cn/connection/curl";
        $params = "a=b&c=d&e=f&g=" . urlencode('王璐个人博客');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    // 要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_HEADER, 0); // 不要http header 加快效率
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    
        curl_setopt($ch, CURLOPT_POST, 1);    // post 提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    
        $output = curl_exec($ch);
        curl_close($ch);
        var_dump($output);
    
    
    }

}
