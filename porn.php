<!doctype html>
<html lang="en">
    <head>
        <title>wap4.co</title>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta charset="utf-8"


<?php
	    
	    
if (!isset($_GET['url']))
{
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><form method="get">Url: <input name="url" type="text"><input type="submit" value="Leech" ></form>';
}
else
{


$url = $_GET['url'];
$url = preg_replace('#(https://|http://)(.*)#i', '$1$2', $url);
$curl = curl_init();
curl_setopt ($curl, CURLOPT_URL, $url);
curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);

$lay = curl_exec($curl);


$title = explode('<title>',$lay);
$title = explode('</title>',$title[1]);
$title = trim($title[0]); 

$thumb = explode('<meta name="twitter:image" content="',$lay);
$thumb = explode('">
<meta name="twitter:domain"',$thumb[1]);
$thumb = trim($thumb[0]); 

$lay = explode('720","videoUrl":"',$lay);
$lay = explode('"},{"defaultQuality',$lay[1]);}

$lay = $lay[0];
$lay =  str_replace('\\','' ,$lay);
$lay =  str_replace('&','@' ,$lay);
curl_close($curl);
 
echo '<div class="card-header">Đăng bài viết</div>

<div class="list-group"><form action="http://xemlasuong.viwap.com/manager/post" method="post">
<div class="list-group-item"><div class="status"><a href="/manager/post?editor=0">Sử dụng Editor( Không hỗ trợ BBcode)</a> | <a href="/manager/post">Dạng thường( Hỗ trợ BBcode)</a></div></div>
<div class="list-group-item">Tiêu đề: <input type="text" name="ten" value="'.$title.'" maxlength="300"></div>
<div class="list-group-item">
Thể loại: 
    <select name="category">  
    	      		<optgroup label="Phim Sex">	
				              		<option value="2">Loạn Luân</option>
              	              				</optgroup>
				    </select>
</div>
<div class="list-group-item">Ảnh đại diện: <input type="text" name="thumb" value="'.$thumb.'" ></div>

<div class="list-group-item">urlvideo: <input type="text" name="urlvideo" value="'.$url.'"></div>
<div class="list-group-item">Nội dung: <textarea name="content" rows="25"></textarea></div>
<div class="list-group-item"><input type="checkbox" name="comment" value="1" checked> Cho phép bình luận</div>
<div class="list-group-item"><center><button type="submit" class="btn btn-primary btn-block">Đăng bài</button></form></center></div>
</div>';


?>


