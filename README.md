# Wordpress-composer-gulp-webpack-theme

Wordpress-composer-gulp-webpack-theme

## Giới thiệu <br/>

Base theme này sử dụng gulp và webpack. Các tính năng tích hợp: <br/>

<ul>
<li>Đồng bộ được source code dễ dàng hơn</li>
<li>Thay đổi cúc trúc thư mục wordpress</li>
<li>Folder riêng để chưa core wordpress</li>
<li>Cấu hình thêm một enviroment</li>
<li>Complie scss và nén css</li>
<li>Complie js, convert từ es6 sang es5 và nén js</li>
<li> Nén hình ảnh</li>
<li>Tách riêng mỗi trang có css và js riêng</li>
<li>Theme được viết theo OOP</li>
<li> Save file bất kỳ tự động reload browser và chạy lệnh terminal</li>
<li> Hỗ trợ nén file</li>
</ul>
<br/>

## Tải các package cần thiết cho web

dùng lệnh sau: <br/>

<pre><code>composer install --prefer-dist</code></pre>
<br/>

## Vào theme tải các pacakge cần thiết để chạy

dùng lệnh sau(cho lần clone đầu tiên): <br/>

<pre><code>npm install</code></pre>
<br/>
dùng lệnh sau: <br/>
<pre><code>npm run start</code></pre>
<br/>

## Setup wp-config

Vào file wp-config để setup. Tìm dòng 89 chứa: <b>$folder_storage = 'Wordpress-gulp-webpack-theme';</b>. Trong biến sau chứa folder chứa project<br/>
Tìm dòng 94 chứa <b> $domain = 'example.com';</b>. Biến này chứa domain setup trên server<br/>
Sau đó từ dòng 30 đến dòng 64 là để setup database thì lúc clone về tạo theo đúng thông số trong các dòng đó<br/>

<pre>
<code>
if ( $_SERVER["SERVER_ADDR"] == '127.0.0.1' ) {
    // setup database connection for local host
    /*----------------------------------------*/
    /** The name of the database for WordPress */
    define( 'DB_NAME', 'wp-testfinal' );
    /** MySQL database username */
    define( 'DB_USER', 'root' );
    /** MySQL database password */
    define( 'DB_PASSWORD', '' );
    /** MySQL hostname */
    define( 'DB_HOST', 'localhost' );

    define( 'DB_CHARSET', 'utf8' );

    define( 'DB_COLLATE', '' );

    define( 'DB_COLLATE', 'utf8_general_ci' );
}else{
    // setup database connection for server
    /*----------------------------------------*/
    /** The name of the database for WordPress */
    define( 'DB_NAME', 'wp-testfinal' );
    /** MySQL database username */
    define( 'DB_USER', 'root' );
    /** MySQL database password */
    define( 'DB_PASSWORD', '' );
    /** MySQL hostname */
    define( 'DB_HOST', 'localhost' );

    define( 'DB_CHARSET', 'utf8' );

    define( 'DB_COLLATE', '' );

    define( 'DB_COLLATE', 'utf  8_general_ci' );
}
</code>
</pre>
<br/>
Ngoài ra trong function  hay theme có thể check được mội trường thông qua config trong file từ dòng 23 đến 27 <br/>
<pre>
<code>
if ( $_SERVER["SERVER_ADDR"] == '127.0.0.1' ) {
    define( 'WP_ENVIRONMENT_TYPE', 'development' );
}else{
    define( 'WP_ENVIRONMENT_TYPE', 'production' );
}
</code>
</pre>
</br>

## Điều cần làm đầu tiên là chạy terminal lệnh sau</br>

Nếu trong máy đã có rồi thì có thể bỏ qua</br>

<pre><code>npm install --global gulp-cli</code></pre>

## Cấu hình browser-sync</br>

Bật file <strong>gulpfile.babel.js</strong> sau đó tìm

<pre><code>  server.init({
    proxy: "http://localhost/wordpress-test" // put your local website link here
  });</code></pre>

Chỉnh thuộc tính proxy thành đường dẫn web tại local

## Các cậu lệnh termnial</br>

1. Trong môi trường develop</br>
 <pre><code>npm run start</code></pre>
2. Build ra thành quả</br>
 <pre><code>npm run build</code></pre>

## Hướng dẫn sử dụng<br/>

Mọi file scss, js,images để code và chỉnh sửa nằm trong thư mục <strong> src</strong>, fonts sẽ nằm trong thư mục <strong>dist</strong><br/>
Theme đã xóa bỏ hoàn toàn jquery ở frontend. Và tích hợp các thư viện sau:<br/>

### Slider: Sử dụng thư viện splidejs <br/>

Đã import sẵn vào js chỉ cần sử dụng thôi tham khảo link trang web <br/>
<a href="https://splidejs.com/getting-started/" target="_blank">https://splidejs.com/getting-started/</a><br/>
Trong css đã có sẳn 3 theme của slider thích theme nào thì import theme đó vào và nhớ xóa theme mặc định trong base theme<br/>

### Cookie: Sử dụng thư viện js cookie <br/>

Đã import sẵn vào js chỉ cần sử dụng thôi tham khảo link trang web <br/>
<a href="https://github.com/js-cookie/js-cookie#es-module" target="_blank">https://github.com/js-cookie/js-cookie#es-module</a><br/>

### Tích hợp sẳn Lazy load <br/>

Đã import và setup sẵn rồi không cần cấu hình thêm.<br/>

### Cài thêm plugin <br/>

Muốn cài thêm thư viện thì cài thông qua npm install và import vào file root.js. Sau đó sử dụng.<br/>

### Cấu trúc file js và scss <br/>

Mỗi trang nên tạo một file bọc ở ngoài là điều kiện thực thi js sau đó import file vào root.js
Các component như sidebar, Menu nên tạo một file js riêng trong thư mục Component sau khi viết sau export ra module rồi import vào root.js sau đó gọi ra. Css cũng vậy tạo thư mục page chứ các scss cho các loại trang, scss cho các component chung nằm ở ngoai cùng folder với main.scss, tạo file nào import file đó vào main.scss<br/>

### Các hàm cắt ảnh cắt ảnh <br/>

Hàm 1 <br/>
\_themename_get_thumbnail_crop_url($width,$height) <br/>
Trả về thẻ img có chứa alt và src của thumbnail đã resize <br/>

Hàm 2 <br/>
\_themename_the_thumbnail_crop($width,$height) <br/>
Echo thẻ img có chứa alt và src của thumbnail đã resize <br/>

Hàm 3 <br/>
\_themename_get_image_crop($url,$width,$height) <br/>
Trả về thẻ img có chứa alt và src của url ảnh đã resize <br/>

Hàm 4 <br/>
\_themename_the_image_crop($url,$width,$height) <br/>
Echo thẻ img có chứa alt và src của url ảnh đã resize <br/>
<br/>
Hàm 5 <br/>
_themename_get_image_crop_url($url,$width,$height)<br/>
<br/>
Trả về url img đã resize
<br/>

### Thêm </br>

Ngoài ra còn một số hàm khác trong function.php</br>

### Các hàm có sẵn trong JS</br>

<pre><code>LayLocalStorage(nameArray,Array)</code></pre>
<pre><code>LuuVaoLocalStorage(Array,nameArray)</code></pre>
