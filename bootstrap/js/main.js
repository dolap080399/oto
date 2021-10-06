	function info_user() {
			// body...
			document.getElementById("logout").innerHTML ="Đăng xuất";
	}
	//kiểm tra tên 
function check_name() {
	var name = document.getElementById("name").value;
	var error_name = document.getElementById("error_name");
	var regexName = /^[^\d+]*[\d+]{0}[^\d+]*$/;

	if (name == "" || name == null) {
		error_name.innerHTML = "Họ tên không được để trống!";
	}else if (!regexName.test(name)) {
		error_name.innerHTML = "Họ tên nhập không hợp lệ!!";
	}else {
		error_name.innerHTML = "";
		return name;
	}
}
//kiểm tra tên đăng nhập
function check_user() {
	var user = document.getElementById("user_name").value;
	var error_user = document.getElementById("error_user");
	
	if(user == "" || user == null){
		error_user.innerHTML = "User không được để trống!";
	}else {
		error_user.innerHTML = "";
		return user;	
	}
}
//kiểm tra phone
function check_phone() {
	var phone = document.getElementById("phone").value;
	var error_phone = document.getElementById("error_phone");
	var regexPhone = /^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/;

	if (phone == "" || phone == null) {
		error_phone.innerHTML = "Số điện thoại không được để trống!";
	}else if (!regexPhone.test(phone)) {
		error_phone.innerHTML = "Số điện thoại nhập không hợp lệ!!";
	}else if (phone.length != 10 ) {
		error_phone.innerHTML = "Số điện thoại chỉ gồm 10 số!!!";
	}else {
		error_phone.innerHTML = "";
		return phone;
	}
}

function check_pass() {
	var pass = document.getElementById("password").value;
	var error_pass = document.getElementById("error_pass");
	var regexpass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;

	if (pass == "" || pass == null) {
		error_pass.innerHTML = "Mật khẩu không được để trống!";
	}else if (!regexpass.test(pass)) {
		error_pass.innerHTML = "Mật khẩu gồm chữ và số gồm 8 ký tự trở lên có ký tự viết hoá";
	}else {
		error_pass.innerHTML = "";
		return pass;
	}
}
function check_continue_pass(){
	var pass = check_pass();

	var con_pass = document.getElementById('continue_pass').value;
	var error_conpass = document.getElementById('error_continue_pass');
	if (con_pass == '' || con_pass == null) {

		error_conpass.innerHTML = "Mật khẩu không để trống";

	}else if(con_pass != pass){
		alert('Mật khẩu xác nhận không trùng khớp!');
	}else{
		error_continue_pass.innerHTML = '';
		return con_pass;
	}
}
function check_file(){
var fileInput = document.getElementById('file');
var filePath = fileInput.value;//lấy giá trị input theo id
var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;//các tập tin cho phép
//Kiểm tra định dạng
if(!allowedExtensions.exec(filePath)){
alert('Vui lòng upload file hình ảnh');
fileInput.value = '';
return false;
}else{
//Image preview
if (fileInput.files && fileInput.files[0]) {
var reader = new FileReader();
reader.onload = function(e) {
document.getElementById('imagePreview').innerHTML = '<img style="width:700px;height:400px;" src="'+e.target.result+'"/>';
};
reader.readAsDataURL(fileInput.files[0]);
}
}
}

function check_address() {
	var address = document.getElementById("address").value;
	var error_address = document.getElementById("error_address");
	
	if(address == "" || address == null){
		error_address.innerHTML = "Địa chỉ không được để trống!";
	}else {
		error_address.innerHTML = "";
		return address;	
	}
}


// function validate_member(){
// 	if (check_name() && check_phone() && check_file() && check_user() && check_address()&& check_pass() && check_continue_pass()) {
// 	}else {
// 		alert("Dữ liệu bạn nhập không hợp lệ! Mời kiểm tra lại!!");
// 		return false;
// 	}
// }
// function validate_admin(){
// 	if (check_name() && check_phone() && check_file() && check_user() && check_address()&& check_pass()	) {
// 	}
// 	else {
// 		alert("Dữ liệu bạn nhập  hợp lệ! Mời kiểm tra lại!!");
// 		return false;
// 	}
// }

// function validate_register(){
// 	if (check_name() && check_phone() && check_email() && check_pass() && check_cPassw()) {
// 	}else {
// 		alert("Mời nhập đầy đủ thông tin!");
// 		return false;
// 	}
// }

function validate_login(){
	if (check_pass() && check_user()) {
	}else {
		alert("Mời nhập đầy đủ thông tin!");
		return false;
	}
}
