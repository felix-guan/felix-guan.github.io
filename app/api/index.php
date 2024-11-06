<?php 
/**php api**/
//var_dump($_POST);
//var_dump($_GET);
$panellistpath = "../resource/public_res/panel/"; 
$irremotelistpath = "../resource/public_res/irremote/"; 
$action = $_GET['action'];
switch ($action){
	//芯片列表
	case "chiplist":
        $test1=array("TSUMV53RUU","TSUMV53RUUL","TSUMV56RUU","TSUMV56RUUL");
	    print_r(json_encode($test1));
    break;
	//屏列表
	case "panellist":
		file_list($panellistpath);
        //$test1=array("HD_1920X1080","1680X1050","1366X768","1024X768");
        //print_r(json_encode($test1));
	break;
	//红外遥控器列表
	case "irremotelist":
		file_list($irremotelistpath);
        // $test1=array("NEC_00BF","NEC_007F","NEC_00FF","NEC_01FE");
        // print_r(json_encode($test1));
	break;
	//屏列表
	case "keypadlist":
        $test1=array("CVT_7KEY","CVT_5KEY","TOPTECH_7KEY","TOPTECH_5KEY");
        print_r(json_encode($test1));
	break;
	default:
		exit(json_encode(error));
}

 function file_list($path)   
{   
	$fileArray = array();
    if ($handle = opendir($path))//打开路径成功   
    {   
        while (false !== ($file = readdir($handle)))//循环读取目录中的文件名并赋值给$file   
        {   
            if ($file != "." && $file != "..")//排除当前路径和前一路径   
            {   
                if (is_dir($path."/".$file))   
                {   
//                    echo $path.": ".$file."<br>";//去掉此行显示的是所有的非目录文件   
                    file_list($path."/".$file);   
                }   
                else   
                {   
     //           	$file = "e:\file\book.txt";
					// $info = pathinfo($val);    //提取文件的路径，后缀名，文件名
					// $path = $info['dirname'];
					// $ext = $info['extension'];
					// $name = $info['filename'];
					// echo $path."\n".$ext."\n".$name;
                    //echo $path."/".$file."<br>"; 
                    // echo $file."<br>"; 
                    $info = pathinfo($path."/".$file);
                    $name = $info['filename'];
                    //echo $name."<br>";
                    $fileArray[] = $name;
                }   
            }   
        }   
    }   
    print_r(json_encode($fileArray));
} 
//$path = "."; 
//file_list($path); 

?>

