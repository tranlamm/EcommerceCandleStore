<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;
use Carbon\Carbon;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer_product_comment')->insert([
            ['account_id' => 2, 'product_id' => 1, 'comment' => 'Sản phẩm tuyệt vời, giao hành nhanh, sẽ ủng hộ shop tiếp', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 1, 'comment' => 'Chưa đốt thử không biết cháy lâu không nhưng nến xinh lắm nha. Shop rất lịch sự nữa 10 điểm', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 1, 'comment' => 'Dạ em đã nhận được hàng rồi, nhân viên bên em cũng đã kiểm hàng đầy đủ. Cảm ơn shop!🙂', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 1, 'comment' => 'Đóng gói cẩn thận. Giao hàng nhanh chưa sử dụng chưa có kết quả', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 1, 'comment' => 'shop gói hàng chắc chắn, shop gửi lời cảm ơn ngọt ngào ❤️có nhiêu ⭐️ e xin tặng hết ạ, sẽ ủng hộ shop tiếp ạ🥰', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 1, 'comment' => 'Shop giao hàng nhanh, dịch vụ chăm sóc khách hàng ok nha, rất là có tâm, sẽ ủng hộ shop lần tiếp theo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 1, 'comment' => 'Giao hàng nhanh, hàng chất lượng, đã mua lần thứ 2 của shop rồi.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 1, 'comment' => 'Lần thứ 4 mua nến ở shop. Hy vọng chất lượng của shop là mãi mãi. Cảm ơn shop nhé!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 1, 'comment' => 'Hàng đóng gói cẩn thận. Như hình của shop. M chưa dùng nên k biết cháy đủ 2h không. Hy vọng chất lượng tốt!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            
            ['account_id' => 2, 'product_id' => 2, 'comment' => 'Nến cháy đc 3,5h. Nói chung là tạm ổn. Nếu đc đúng 4h thì thích hơn.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 2, 'comment' => 'Nến hơi mỏng, không mùi gì, mau tàn. Nhưng thôi dùng cũng được.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 2, 'comment' => 'Nến đều và đẹp, giao hàng nhanh, đủ số lượng, nến đốt được 4 tiếng luôn nhé.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 2, 'comment' => 'Giao hàng nhanh, đẹp, chất lượng tốt, đủ sản phẩm, giá cả hợp lý. Đáng mua nhé💐', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 2, 'comment' => 'Đúng với mô tả: đã nhận đủ hàng, hàng giống như hình. Vận chuyển đi xa nhưng Đóng gói sơ sài chưa ok lắm', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 2, 'comment' => 'hàng nhận nhanh lắm ạ , giao đầy đủ nha , sẽ ủng hộ shop dài dàiiii', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 2, 'comment' => 'Giao hàng nhanh, đúng sản phẩm  rất là ưng luôn,giá lại rẻ, lần sau ủng hộ tiếp', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 2, 'comment' => 'Đặt hoả tốc giao nhanh lại rẽ hơn giao thường, sẽ ủng hộ tiếp trong tl', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 2, 'comment' => 'Sản phẩm đẹp, giao hàng nhanh. Shop lịch sự, vui vẻ. Sẽ ủng hộ nhiều lần.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 3, 'comment' => 'Hộp nến đóng gói ko chắc chỉ có mỗi 1 lớp bọc ngoài ko có cả thùng carton đựng. Bản thân nến cũng méo xẹo, so với cái nến 4k mình mua ở shop khác đúng kiểu khác 1 trời 1 vực', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 3, 'comment' => 'Thanks Shop...đóng gói rất chắc chắn,sử dụng xem sao rồi sẽ mua tiếp..', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 3, 'comment' => 'Sản phẩm tốt lắm , giống ảnh và mô tả , sẽ mua lại Shop lần sắp tới ạ 🤗🤗🤗', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 3, 'comment' => 'Sản phẩm đẹp chất lượng ok có dịp sẽ ủng hộ tiếp', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 3, 'comment' => 'Shop giao hàng oke, chất lượng, đúng số lượng. Lần sau sẽ ủng hộ nữa nhé', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 3, 'comment' => 'Sp như hình đóng hàng kỹ có dịp sẽ ủng hộ shop', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 3, 'comment' => 'Mình thấy đóng gói kỹ, chưa dùng thử, hôm nào uống trà đốt thử xem.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 3, 'comment' => 'Hình ảnh chỉ mang tính chất nhận xu, shop đóng gói cẩn thận giao hàng nhanh chất lượng ổn. Còn ủng họi nữa ạ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 3, 'comment' => 'Dùng trang trí bàn lm việc cũng khá ok. Chứ k thơm', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 4, 'comment' => 'Giao hàng khá nhanh, sản phẩm nhỏ hơn so với tưởng tượng nhưng săn sale 9k vậy rẻ rồi mới ngửi qua thì thấy thơm nhẹ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 4, 'comment' => 'Mình mua hai cái, một cái bị hỏng còn một cái bình thường. Mình rất thất vọng, đây là đơn hàng đầu tiên mình đánh giá 3 sao', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 4, 'comment' => 'Tốt chất lượng tuyệt vời trên cả sự mong đợi còn gì vui hơn khi.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 4, 'comment' => 'NẾn thơm mùi thơm, giống mùi bút sáp màu ấy ạ=)))) còn hoa và bình thì quá uki', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 4, 'comment' => 'Sản phẩm tốt lắm ạ , giao nhanh và đủ hàng .sẽ ủng hộ shop lần sau', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 4, 'comment' => 'Theo cảm nhận của mình thì khi đốt thì có mùi thơm nhè nhẹ không quá nồng nến cũng bé phù hợp với giá tiền sản phẩm ổn có thể suy nghĩ việc mua lại', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 4, 'comment' => 'Cái j cũg tốt hết nha mng, ảnh em lấy tại thiếu xử ạ mà quên chụp', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 4, 'comment' => 'sản phẩm okila mọi người ủng hộ ngta đê sản phẩm tốt lắm mình nói thật k phải để nhận xu đâu', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 4, 'comment' => 'Nến thơm, shop bọc rất kĩ, nhưng midnh không hiểu sao mà khi đốt thì kiến lạ bu khá nhiều.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 5, 'comment' => 'Giao hàng khá nhanh, sản phẩm nhỏ hơn so với tưởng tượng nhưng săn sale 9k vậy rẻ rồi mới ngửi qua thì thấy thơm nhẹ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 5, 'comment' => 'Mình mua hai cái, một cái bị hỏng còn một cái bình thường. Mình rất thất vọng, đây là đơn hàng đầu tiên mình đánh giá 3 sao', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 5, 'comment' => 'Tốt chất lượng tuyệt vời trên cả sự mong đợi còn gì vui hơn khi.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 5, 'comment' => 'NẾn thơm mùi thơm, giống mùi bút sáp màu ấy ạ=)))) còn hoa và bình thì quá uki', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 5, 'comment' => 'Sản phẩm tốt lắm ạ , giao nhanh và đủ hàng .sẽ ủng hộ shop lần sau', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 5, 'comment' => 'Theo cảm nhận của mình thì khi đốt thì có mùi thơm nhè nhẹ không quá nồng nến cũng bé phù hợp với giá tiền sản phẩm ổn có thể suy nghĩ việc mua lại', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 5, 'comment' => 'Cái j cũg tốt hết nha mng, ảnh em lấy tại thiếu xử ạ mà quên chụp', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 5, 'comment' => 'sản phẩm okila mọi người ủng hộ ngta đê sản phẩm tốt lắm mình nói thật k phải để nhận xu đâu', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 5, 'comment' => 'Nến thơm, shop bọc rất kĩ, nhưng midnh không hiểu sao mà khi đốt thì kiến lạ bu khá nhiều.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 6, 'comment' => 'Giao hàng khá nhanh, sản phẩm nhỏ hơn so với tưởng tượng nhưng săn sale 9k vậy rẻ rồi mới ngửi qua thì thấy thơm nhẹ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 6, 'comment' => 'Mình mua hai cái, một cái bị hỏng còn một cái bình thường. Mình rất thất vọng, đây là đơn hàng đầu tiên mình đánh giá 3 sao', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 6, 'comment' => 'Tốt chất lượng tuyệt vời trên cả sự mong đợi còn gì vui hơn khi.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 6, 'comment' => 'NẾn thơm mùi thơm, giống mùi bút sáp màu ấy ạ=)))) còn hoa và bình thì quá uki', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 6, 'comment' => 'Sản phẩm tốt lắm ạ , giao nhanh và đủ hàng .sẽ ủng hộ shop lần sau', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 6, 'comment' => 'Theo cảm nhận của mình thì khi đốt thì có mùi thơm nhè nhẹ không quá nồng nến cũng bé phù hợp với giá tiền sản phẩm ổn có thể suy nghĩ việc mua lại', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 6, 'comment' => 'Cái j cũg tốt hết nha mng, ảnh em lấy tại thiếu xử ạ mà quên chụp', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 6, 'comment' => 'sản phẩm okila mọi người ủng hộ ngta đê sản phẩm tốt lắm mình nói thật k phải để nhận xu đâu', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 6, 'comment' => 'Nến thơm, shop bọc rất kĩ, nhưng midnh không hiểu sao mà khi đốt thì kiến lạ bu khá nhiều.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 7, 'comment' => 'Giao hàng khá nhanh, sản phẩm nhỏ hơn so với tưởng tượng nhưng săn sale 9k vậy rẻ rồi mới ngửi qua thì thấy thơm nhẹ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 7, 'comment' => 'Mình mua hai cái, một cái bị hỏng còn một cái bình thường. Mình rất thất vọng, đây là đơn hàng đầu tiên mình đánh giá 3 sao', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 7, 'comment' => 'Tốt chất lượng tuyệt vời trên cả sự mong đợi còn gì vui hơn khi.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 7, 'comment' => 'NẾn thơm mùi thơm, giống mùi bút sáp màu ấy ạ=)))) còn hoa và bình thì quá uki', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 7, 'comment' => 'Sản phẩm tốt lắm ạ , giao nhanh và đủ hàng .sẽ ủng hộ shop lần sau', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 7, 'comment' => 'Theo cảm nhận của mình thì khi đốt thì có mùi thơm nhè nhẹ không quá nồng nến cũng bé phù hợp với giá tiền sản phẩm ổn có thể suy nghĩ việc mua lại', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 7, 'comment' => 'Cái j cũg tốt hết nha mng, ảnh em lấy tại thiếu xử ạ mà quên chụp', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 7, 'comment' => 'sản phẩm okila mọi người ủng hộ ngta đê sản phẩm tốt lắm mình nói thật k phải để nhận xu đâu', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 7, 'comment' => 'Nến thơm, shop bọc rất kĩ, nhưng midnh không hiểu sao mà khi đốt thì kiến lạ bu khá nhiều.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 8, 'comment' => 'Giao hàng khá nhanh, sản phẩm nhỏ hơn so với tưởng tượng nhưng săn sale 9k vậy rẻ rồi mới ngửi qua thì thấy thơm nhẹ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 8, 'comment' => 'Mình mua hai cái, một cái bị hỏng còn một cái bình thường. Mình rất thất vọng, đây là đơn hàng đầu tiên mình đánh giá 3 sao', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 8, 'comment' => 'Tốt chất lượng tuyệt vời trên cả sự mong đợi còn gì vui hơn khi.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 8, 'comment' => 'NẾn thơm mùi thơm, giống mùi bút sáp màu ấy ạ=)))) còn hoa và bình thì quá uki', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 8, 'comment' => 'Sản phẩm tốt lắm ạ , giao nhanh và đủ hàng .sẽ ủng hộ shop lần sau', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 8, 'comment' => 'Theo cảm nhận của mình thì khi đốt thì có mùi thơm nhè nhẹ không quá nồng nến cũng bé phù hợp với giá tiền sản phẩm ổn có thể suy nghĩ việc mua lại', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 8, 'comment' => 'Cái j cũg tốt hết nha mng, ảnh em lấy tại thiếu xử ạ mà quên chụp', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 8, 'comment' => 'sản phẩm okila mọi người ủng hộ ngta đê sản phẩm tốt lắm mình nói thật k phải để nhận xu đâu', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 8, 'comment' => 'Nến thơm, shop bọc rất kĩ, nhưng midnh không hiểu sao mà khi đốt thì kiến lạ bu khá nhiều.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        
            ['account_id' => 2, 'product_id' => 9, 'comment' => 'Giao hàng khá nhanh, sản phẩm nhỏ hơn so với tưởng tượng nhưng săn sale 9k vậy rẻ rồi mới ngửi qua thì thấy thơm nhẹ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 9, 'comment' => 'Mình mua hai cái, một cái bị hỏng còn một cái bình thường. Mình rất thất vọng, đây là đơn hàng đầu tiên mình đánh giá 3 sao', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 9, 'comment' => 'Tốt chất lượng tuyệt vời trên cả sự mong đợi còn gì vui hơn khi.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 9, 'comment' => 'NẾn thơm mùi thơm, giống mùi bút sáp màu ấy ạ=)))) còn hoa và bình thì quá uki', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 9, 'comment' => 'Sản phẩm tốt lắm ạ , giao nhanh và đủ hàng .sẽ ủng hộ shop lần sau', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 9, 'comment' => 'Theo cảm nhận của mình thì khi đốt thì có mùi thơm nhè nhẹ không quá nồng nến cũng bé phù hợp với giá tiền sản phẩm ổn có thể suy nghĩ việc mua lại', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 9, 'comment' => 'Cái j cũg tốt hết nha mng, ảnh em lấy tại thiếu xử ạ mà quên chụp', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 9, 'comment' => 'sản phẩm okila mọi người ủng hộ ngta đê sản phẩm tốt lắm mình nói thật k phải để nhận xu đâu', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 9, 'comment' => 'Nến thơm, shop bọc rất kĩ, nhưng midnh không hiểu sao mà khi đốt thì kiến lạ bu khá nhiều.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            
            ['account_id' => 2, 'product_id' => 10, 'comment' => 'Giao hàng khá nhanh, sản phẩm nhỏ hơn so với tưởng tượng nhưng săn sale 9k vậy rẻ rồi mới ngửi qua thì thấy thơm nhẹ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 10, 'comment' => 'Mình mua hai cái, một cái bị hỏng còn một cái bình thường. Mình rất thất vọng, đây là đơn hàng đầu tiên mình đánh giá 3 sao', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 10, 'comment' => 'Tốt chất lượng tuyệt vời trên cả sự mong đợi còn gì vui hơn khi.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 10, 'comment' => 'NẾn thơm mùi thơm, giống mùi bút sáp màu ấy ạ=)))) còn hoa và bình thì quá uki', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 10, 'comment' => 'Sản phẩm tốt lắm ạ , giao nhanh và đủ hàng .sẽ ủng hộ shop lần sau', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 10, 'comment' => 'Theo cảm nhận của mình thì khi đốt thì có mùi thơm nhè nhẹ không quá nồng nến cũng bé phù hợp với giá tiền sản phẩm ổn có thể suy nghĩ việc mua lại', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 10, 'comment' => 'Cái j cũg tốt hết nha mng, ảnh em lấy tại thiếu xử ạ mà quên chụp', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 10, 'comment' => 'sản phẩm okila mọi người ủng hộ ngta đê sản phẩm tốt lắm mình nói thật k phải để nhận xu đâu', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 10, 'comment' => 'Nến thơm, shop bọc rất kĩ, nhưng midnh không hiểu sao mà khi đốt thì kiến lạ bu khá nhiều.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
