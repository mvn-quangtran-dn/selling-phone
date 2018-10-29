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
	if (data.length > 0) {
		$.each(data, function(index, val) {
		totalc += val.subtotal;
		console.log(totalc);
		checkhtml += '<tr>'
			+ '<td>' + val.name + '</td>'
			+ '<td>' + val.price + '</td>'
			+ "<td id=\"soluong\">" + "<input type=\"number\" name=\"quantity\" class=\"soluong12\" data_id=\""+val.qtt+"\" id=\""+val.id+"\" value=\""+val.qtt+"\">" + '</td>'
			+ '<td id="subtotal">' + val.subtotal + '</td>'
			+ '<td>' + '<button name="delete" class="btn btn-danger btn-xs remove" id="'+index+"\">Remove</button></td>"
			+ '</tr>'; 
		
		});
	} else {
		checkhtml = '<tr>'
                    +'<td colspan="5" align="center">'
                        +'Không có sản phẩm trong giỏ hàng'
                    +'</td>'
                +'</tr>';
	} 
	$('tbody').html(checkhtml);
	$('#totalcheckout').html(totalc);
}

$(document).on('click', '.remove',function() {
	if (confirm("Bạn có muốn xóa sản phẩm này ra khỏi giỏ hàng không?")) {
        console.log('da den');
        if (cart.length == 1) {
            cart = [];
        } else {
            var item = $(this).attr('id');
            console.log(item);
            cart.splice(item, 1);
            console.log(cart);
        }
        localStorage.setItem('cart',JSON.stringify(cart))
        $('#cart-popover').popover('hide');
        printorder(cart);
        alert('Bạn đả xóa sản phẩm ra khỏi giỏ hàng');
    }
});