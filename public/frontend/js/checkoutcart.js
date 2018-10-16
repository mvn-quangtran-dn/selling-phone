var checkcart = [];

if(JSON.parse(localStorage.getItem('cart'))) {
	checkcart = JSON.parse(localStorage.getItem('cart'));
	printorder(checkcart);
} else {
	$('#orderError').html("Không có trong sản phẩm trong giỏ hàng");
}
function printorder(data) {
	var checkhtml = '';
	var checktotalhtml = '';
	var totalc = 0;
	$.each(data, function(index, val) {
		totalc += val.subtotal;
		console.log(totalc);
		checkhtml += '<tr>'
			+ '<td>' + val.id + '</td>'
			+ '<td>' + val.name + '</td>'
			+ '<td>' + val.price + '</td>'
			+ "<td id=\"soluong\" data-product=\""+val.qtt+"\" data-id=\""+val.id+"\">" + "<input type=\"number\" name=\"quantity\" id=\"qtt\" value=\""+val.qtt+"\">" + '</td>'
			+ '<td id="subtotal">' + val.subtotal + '</td>'
			+ '<td>' + '<button name="delete" class="btn btn-danger btn-xs delete" id="'+index+"\">Remove</button></td>"
			+ '</tr>'; 
		
	});
	$('tbody').html(checkhtml);
	$('#totalcheckout').html(totalc);
}
