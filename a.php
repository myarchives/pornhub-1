 <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="Cache-Control" content="no-cache"/>
        <meta http-equiv="content-language" content="en"/>
      	
        <title>MiBlog</title>
        <meta name="robots" content="index,follow">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    	<link type="text/css" rel="stylesheet" href="http://cuocsong.viwap.com/css/admin-style.css?v=472256984">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>

<?php
	    
	    
if (!isset($_GET['url']))
{
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><form method="get">Url: <input name="url" type="text"><input type="submit" value="Leech" ></form>';
}
else
{
    $td = 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/45.0 Chrome/39.0.2171.95 Safari/537.36';
 $url = $_GET['url'];
$url = preg_replace('#(https://|http://)(.*)#i', '$1$2', $url);
$curl = curl_init();
curl_setopt ($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_USERAGENT, $td);
curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
$title = curl_exec($curl);
$title = explode('<title>',$title);
$title = explode('</title>',$title[1]);
$title = trim($title[0]);
$title =  str_replace('- Pornhub.com','' ,$title);
$thumb = curl_exec($curl);
$thumb = explode('og:image" content="',$thumb);
$thumb = explode('<meta property="og:video:url',$thumb[1]);
$thumb = trim($thumb[0]);
$thumb =  str_replace('" />','' ,$thumb);
$thumb =  str_replace(' ','' ,$thumb);
$xxxx = preg_replace('#(.*?)((.*?))((.*?))(.*?).jpg#is',"$1$2$3",$thumb);


$lay = curl_exec($curl);
$lay = explode('"720","videoUrl":"',$lay);
$lay = explode('"},{"defaultQuality":true,"format":"mp4","quality":"480","videoUrl":"',$lay[1]);
$lay = trim($lay[0]);
$lay = trim($lay);
curl_close($curl);


echo '
<div class="card-header">Đăng bài viết</div>

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
<div class="list-group-item">Nội dung: <textarea name="content" rows="25">'.$title.'
'.$thumb.'</textarea></div>
<div class="list-group-item"><input type="checkbox" name="comment" value="1" checked> Cho phép bình luận</div>
<div class="list-group-item"><center><button type="submit" class="btn btn-primary btn-block">Đăng bài</button></form></center></div>
</div>'; 

}

?>
