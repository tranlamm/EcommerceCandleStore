<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;
use Carbon\Carbon;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer_product_review')->insert([
            ['account_id' => 2, 'product_id' => 1, 'point' => 1, 'comment' => 'Sản phẩm tuyệt vời, giao hành nhanh, sẽ ủng hộ shop tiếp', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 1, 'point' => 2, 'comment' => 'Chưa đốt thử không biết cháy lâu không nhưng nến xinh lắm nha. Shop rất lịch sự nữa 10 điểm', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 1, 'point' => 3, 'comment' => 'Dạ em đã nhận được hàng rồi, nhân viên bên em cũng đã kiểm hàng đầy đủ. Cảm ơn shop!🙂', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 1, 'point' => 4, 'comment' => 'Đóng gói cẩn thận. Giao hàng nhanh chưa sử dụng chưa có kết quả', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 1, 'point' => 5, 'comment' => 'shop gói hàng chắc chắn, shop gửi lời cảm ơn ngọt ngào ❤️có nhiêu ⭐️ e xin tặng hết ạ, sẽ ủng hộ shop tiếp ạ🥰', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 1, 'point' => 4, 'comment' => 'Shop giao hàng nhanh, dịch vụ chăm sóc khách hàng ok nha, rất là có tâm, sẽ ủng hộ shop lần tiếp theo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 1, 'point' => 3, 'comment' => 'Giao hàng nhanh, hàng chất lượng, đã mua lần thứ 2 của shop rồi.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 1, 'point' => 5, 'comment' => 'Lần thứ 4 mua nến ở shop. Hy vọng chất lượng của shop là mãi mãi. Cảm ơn shop nhé!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 1, 'point' => 5, 'comment' => 'Hàng đóng gói cẩn thận. Như hình của shop. M chưa dùng nên k biết cháy đủ 2h không. Hy vọng chất lượng tốt!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 2, 'point' => 5, 'comment' => 'Sản phẩm tuyệt vời, giao hành nhanh, sẽ ủng hộ shop tiếp', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 2, 'point' => 5, 'comment' => 'Chưa đốt thử không biết cháy lâu không nhưng nến xinh lắm nha. Shop rất lịch sự nữa 20 điểm', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 2, 'point' => 5, 'comment' => 'Dạ em đã nhận được hàng rồi, nhân viên bên em cũng đã kiểm hàng đầy đủ. Cảm ơn shop!🙂', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 2, 'point' => 4, 'comment' => 'Đóng gói cẩn thận. Giao hàng nhanh chưa sử dụng chưa có kết quả', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 2, 'point' => 5, 'comment' => 'shop gói hàng chắc chắn, shop gửi lời cảm ơn ngọt ngào ❤️có nhiêu ⭐️ e xin tặng hết ạ, sẽ ủng hộ shop tiếp ạ🥰', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 2, 'point' => 4, 'comment' => 'Shop giao hàng nhanh, dịch vụ chăm sóc khách hàng ok nha, rất là có tâm, sẽ ủng hộ shop lần tiếp theo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 2, 'point' => 3, 'comment' => 'Giao hàng nhanh, hàng chất lượng, đã mua lần thứ 2 của shop rồi.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 2, 'point' => 5, 'comment' => 'Lần thứ 4 mua nến ở shop. Hy vọng chất lượng của shop là mãi mãi. Cảm ơn shop nhé!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 2, 'point' => 5, 'comment' => 'Hàng đóng gói cẩn thận. Như hình của shop. M chưa dùng nên k biết cháy đủ 2h không. Hy vọng chất lượng tốt!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 3, 'point' => 2, 'comment' => 'Sản phẩm tuyệt vời, giao hành nhanh, sẽ ủng hộ shop tiếp', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 3, 'point' => 2, 'comment' => 'Chưa đốt thử không biết cháy lâu không nhưng nến xinh lắm nha. Shop rất lịch sự nữa 10 điểm', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 3, 'point' => 2, 'comment' => 'Dạ em đã nhận được hàng rồi, nhân viên bên em cũng đã kiểm hàng đầy đủ. Cảm ơn shop!🙂', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 3, 'point' => 2, 'comment' => 'Đóng gói cẩn thận. Giao hàng nhanh chưa sử dụng chưa có kết quả', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 3, 'point' => 2, 'comment' => 'shop gói hàng chắc chắn, shop gửi lời cảm ơn ngọt ngào ❤️có nhiêu ⭐️ e xin tặng hết ạ, sẽ ủng hộ shop tiếp ạ🥰', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 3, 'point' => 2, 'comment' => 'Shop giao hàng nhanh, dịch vụ chăm sóc khách hàng ok nha, rất là có tâm, sẽ ủng hộ shop lần tiếp theo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 3, 'point' => 2, 'comment' => 'Giao hàng nhanh, hàng chất lượng, đã mua lần thứ 2 của shop rồi.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 3, 'point' => 3, 'comment' => 'Lần thứ 4 mua nến ở shop. Hy vọng chất lượng của shop là mãi mãi. Cảm ơn shop nhé!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 3, 'point' => 5, 'comment' => 'Hàng đóng gói cẩn thận. Như hình của shop. M chưa dùng nên k biết cháy đủ 2h không. Hy vọng chất lượng tốt!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 4, 'point' => 3, 'comment' => 'Sản phẩm tuyệt vời, giao hành nhanh, sẽ ủng hộ shop tiếp', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 4, 'point' => 3, 'comment' => 'Chưa đốt thử không biết cháy lâu không nhưng nến xinh lắm nha. Shop rất lịch sự nữa 10 điểm', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 4, 'point' => 3, 'comment' => 'Dạ em đã nhận được hàng rồi, nhân viên bên em cũng đã kiểm hàng đầy đủ. Cảm ơn shop!🙂', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 4, 'point' => 3, 'comment' => 'Đóng gói cẩn thận. Giao hàng nhanh chưa sử dụng chưa có kết quả', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 4, 'point' => 3, 'comment' => 'shop gói hàng chắc chắn, shop gửi lời cảm ơn ngọt ngào ❤️có nhiêu ⭐️ e xin tặng hết ạ, sẽ ủng hộ shop tiếp ạ🥰', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 4, 'point' => 3, 'comment' => 'Shop giao hàng nhanh, dịch vụ chăm sóc khách hàng ok nha, rất là có tâm, sẽ ủng hộ shop lần tiếp theo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 4, 'point' => 3, 'comment' => 'Giao hàng nhanh, hàng chất lượng, đã mua lần thứ 2 của shop rồi.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 4, 'point' => 5, 'comment' => 'Lần thứ 4 mua nến ở shop. Hy vọng chất lượng của shop là mãi mãi. Cảm ơn shop nhé!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 4, 'point' => 5, 'comment' => 'Hàng đóng gói cẩn thận. Như hình của shop. M chưa dùng nên k biết cháy đủ 2h không. Hy vọng chất lượng tốt!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 5, 'point' => 5, 'comment' => 'Sản phẩm tuyệt vời, giao hành nhanh, sẽ ủng hộ shop tiếp', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 5, 'point' => 5, 'comment' => 'Chưa đốt thử không biết cháy lâu không nhưng nến xinh lắm nha. Shop rất lịch sự nữa 10 điểm', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 5, 'point' => 5, 'comment' => 'Dạ em đã nhận được hàng rồi, nhân viên bên em cũng đã kiểm hàng đầy đủ. Cảm ơn shop!🙂', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 5, 'point' => 5, 'comment' => 'Đóng gói cẩn thận. Giao hàng nhanh chưa sử dụng chưa có kết quả', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 5, 'point' => 5, 'comment' => 'shop gói hàng chắc chắn, shop gửi lời cảm ơn ngọt ngào ❤️có nhiêu ⭐️ e xin tặng hết ạ, sẽ ủng hộ shop tiếp ạ🥰', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 5, 'point' => 5, 'comment' => 'Shop giao hàng nhanh, dịch vụ chăm sóc khách hàng ok nha, rất là có tâm, sẽ ủng hộ shop lần tiếp theo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 5, 'point' => 5, 'comment' => 'Giao hàng nhanh, hàng chất lượng, đã mua lần thứ 2 của shop rồi.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 5, 'point' => 5, 'comment' => 'Lần thứ 4 mua nến ở shop. Hy vọng chất lượng của shop là mãi mãi. Cảm ơn shop nhé!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 5, 'point' => 5, 'comment' => 'Hàng đóng gói cẩn thận. Như hình của shop. M chưa dùng nên k biết cháy đủ 2h không. Hy vọng chất lượng tốt!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 6, 'point' => 4, 'comment' => 'Sản phẩm tuyệt vời, giao hành nhanh, sẽ ủng hộ shop tiếp', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 6, 'point' => 5, 'comment' => 'Chưa đốt thử không biết cháy lâu không nhưng nến xinh lắm nha. Shop rất lịch sự nữa 10 điểm', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 6, 'point' => 4, 'comment' => 'Dạ em đã nhận được hàng rồi, nhân viên bên em cũng đã kiểm hàng đầy đủ. Cảm ơn shop!🙂', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 6, 'point' => 5, 'comment' => 'Đóng gói cẩn thận. Giao hàng nhanh chưa sử dụng chưa có kết quả', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 6, 'point' => 4, 'comment' => 'shop gói hàng chắc chắn, shop gửi lời cảm ơn ngọt ngào ❤️có nhiêu ⭐️ e xin tặng hết ạ, sẽ ủng hộ shop tiếp ạ🥰', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 6, 'point' => 5, 'comment' => 'Shop giao hàng nhanh, dịch vụ chăm sóc khách hàng ok nha, rất là có tâm, sẽ ủng hộ shop lần tiếp theo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 6, 'point' => 4, 'comment' => 'Giao hàng nhanh, hàng chất lượng, đã mua lần thứ 2 của shop rồi.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 6, 'point' => 5, 'comment' => 'Lần thứ 4 mua nến ở shop. Hy vọng chất lượng của shop là mãi mãi. Cảm ơn shop nhé!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 6, 'point' => 5, 'comment' => 'Hàng đóng gói cẩn thận. Như hình của shop. M chưa dùng nên k biết cháy đủ 2h không. Hy vọng chất lượng tốt!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 7, 'point' => 1, 'comment' => 'Sản phẩm tuyệt vời, giao hành nhanh, sẽ ủng hộ shop tiếp', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 7, 'point' => 1, 'comment' => 'Chưa đốt thử không biết cháy lâu không nhưng nến xinh lắm nha. Shop rất lịch sự nữa 10 điểm', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 7, 'point' => 1, 'comment' => 'Dạ em đã nhận được hàng rồi, nhân viên bên em cũng đã kiểm hàng đầy đủ. Cảm ơn shop!🙂', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 7, 'point' => 1, 'comment' => 'Đóng gói cẩn thận. Giao hàng nhanh chưa sử dụng chưa có kết quả', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 7, 'point' => 1, 'comment' => 'shop gói hàng chắc chắn, shop gửi lời cảm ơn ngọt ngào ❤️có nhiêu ⭐️ e xin tặng hết ạ, sẽ ủng hộ shop tiếp ạ🥰', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 7, 'point' => 1, 'comment' => 'Shop giao hàng nhanh, dịch vụ chăm sóc khách hàng ok nha, rất là có tâm, sẽ ủng hộ shop lần tiếp theo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 7, 'point' => 1, 'comment' => 'Giao hàng nhanh, hàng chất lượng, đã mua lần thứ 2 của shop rồi.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 7, 'point' => 1, 'comment' => 'Lần thứ 4 mua nến ở shop. Hy vọng chất lượng của shop là mãi mãi. Cảm ơn shop nhé!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 7, 'point' => 1, 'comment' => 'Hàng đóng gói cẩn thận. Như hình của shop. M chưa dùng nên k biết cháy đủ 2h không. Hy vọng chất lượng tốt!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 8, 'point' => 2, 'comment' => 'Sản phẩm tuyệt vời, giao hành nhanh, sẽ ủng hộ shop tiếp', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 8, 'point' => 2, 'comment' => 'Chưa đốt thử không biết cháy lâu không nhưng nến xinh lắm nha. Shop rất lịch sự nữa 10 điểm', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 8, 'point' => 2, 'comment' => 'Dạ em đã nhận được hàng rồi, nhân viên bên em cũng đã kiểm hàng đầy đủ. Cảm ơn shop!🙂', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 8, 'point' => 2, 'comment' => 'Đóng gói cẩn thận. Giao hàng nhanh chưa sử dụng chưa có kết quả', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 8, 'point' => 2, 'comment' => 'shop gói hàng chắc chắn, shop gửi lời cảm ơn ngọt ngào ❤️có nhiêu ⭐️ e xin tặng hết ạ, sẽ ủng hộ shop tiếp ạ🥰', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 8, 'point' => 2, 'comment' => 'Shop giao hàng nhanh, dịch vụ chăm sóc khách hàng ok nha, rất là có tâm, sẽ ủng hộ shop lần tiếp theo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 8, 'point' => 2, 'comment' => 'Giao hàng nhanh, hàng chất lượng, đã mua lần thứ 2 của shop rồi.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 8, 'point' => 2, 'comment' => 'Lần thứ 4 mua nến ở shop. Hy vọng chất lượng của shop là mãi mãi. Cảm ơn shop nhé!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 8, 'point' => 2, 'comment' => 'Hàng đóng gói cẩn thận. Như hình của shop. M chưa dùng nên k biết cháy đủ 2h không. Hy vọng chất lượng tốt!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 9, 'point' => 3, 'comment' => 'Sản phẩm tuyệt vời, giao hành nhanh, sẽ ủng hộ shop tiếp', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 9, 'point' => 3, 'comment' => 'Chưa đốt thử không biết cháy lâu không nhưng nến xinh lắm nha. Shop rất lịch sự nữa 10 điểm', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 9, 'point' => 3, 'comment' => 'Dạ em đã nhận được hàng rồi, nhân viên bên em cũng đã kiểm hàng đầy đủ. Cảm ơn shop!🙂', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 9, 'point' => 3, 'comment' => 'Đóng gói cẩn thận. Giao hàng nhanh chưa sử dụng chưa có kết quả', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 9, 'point' => 3, 'comment' => 'shop gói hàng chắc chắn, shop gửi lời cảm ơn ngọt ngào ❤️có nhiêu ⭐️ e xin tặng hết ạ, sẽ ủng hộ shop tiếp ạ🥰', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 9, 'point' => 3, 'comment' => 'Shop giao hàng nhanh, dịch vụ chăm sóc khách hàng ok nha, rất là có tâm, sẽ ủng hộ shop lần tiếp theo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 9, 'point' => 3, 'comment' => 'Giao hàng nhanh, hàng chất lượng, đã mua lần thứ 2 của shop rồi.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 9, 'point' => 3, 'comment' => 'Lần thứ 4 mua nến ở shop. Hy vọng chất lượng của shop là mãi mãi. Cảm ơn shop nhé!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 9, 'point' => 3, 'comment' => 'Hàng đóng gói cẩn thận. Như hình của shop. M chưa dùng nên k biết cháy đủ 2h không. Hy vọng chất lượng tốt!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 10, 'point' => 5, 'comment' => 'Sản phẩm tuyệt vời, giao hành nhanh, sẽ ủng hộ shop tiếp', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 10, 'point' => 5, 'comment' => 'Chưa đốt thử không biết cháy lâu không nhưng nến xinh lắm nha. Shop rất lịch sự nữa 10 điểm', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 10, 'point' => 5, 'comment' => 'Dạ em đã nhận được hàng rồi, nhân viên bên em cũng đã kiểm hàng đầy đủ. Cảm ơn shop!🙂', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 10, 'point' => 5, 'comment' => 'Đóng gói cẩn thận. Giao hàng nhanh chưa sử dụng chưa có kết quả', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 10, 'point' => 5, 'comment' => 'shop gói hàng chắc chắn, shop gửi lời cảm ơn ngọt ngào ❤️có nhiêu ⭐️ e xin tặng hết ạ, sẽ ủng hộ shop tiếp ạ🥰', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 10, 'point' => 5, 'comment' => 'Shop giao hàng nhanh, dịch vụ chăm sóc khách hàng ok nha, rất là có tâm, sẽ ủng hộ shop lần tiếp theo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 10, 'point' => 5, 'comment' => 'Giao hàng nhanh, hàng chất lượng, đã mua lần thứ 2 của shop rồi.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 10, 'point' => 5, 'comment' => 'Lần thứ 4 mua nến ở shop. Hy vọng chất lượng của shop là mãi mãi. Cảm ơn shop nhé!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 10, 'point' => 5, 'comment' => 'Hàng đóng gói cẩn thận. Như hình của shop. M chưa dùng nên k biết cháy đủ 2h không. Hy vọng chất lượng tốt!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        
            ['account_id' => 2, 'product_id' => 11, 'point' => 5, 'comment' => 'Sản phẩm tuyệt vời, giao hành nhanh, sẽ ủng hộ shop tiếp', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 11, 'point' => 5, 'comment' => 'Chưa đốt thử không biết cháy lâu không nhưng nến xinh lắm nha. Shop rất lịch sự nữa 10 điểm', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 11, 'point' => 5, 'comment' => 'Dạ em đã nhận được hàng rồi, nhân viên bên em cũng đã kiểm hàng đầy đủ. Cảm ơn shop!🙂', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 11, 'point' => 5, 'comment' => 'Đóng gói cẩn thận. Giao hàng nhanh chưa sử dụng chưa có kết quả', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 11, 'point' => 5, 'comment' => 'shop gói hàng chắc chắn, shop gửi lời cảm ơn ngọt ngào ❤️có nhiêu ⭐️ e xin tặng hết ạ, sẽ ủng hộ shop tiếp ạ🥰', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 11, 'point' => 5, 'comment' => 'Shop giao hàng nhanh, dịch vụ chăm sóc khách hàng ok nha, rất là có tâm, sẽ ủng hộ shop lần tiếp theo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 11, 'point' => 5, 'comment' => 'Giao hàng nhanh, hàng chất lượng, đã mua lần thứ 2 của shop rồi.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 11, 'point' => 5, 'comment' => 'Lần thứ 4 mua nến ở shop. Hy vọng chất lượng của shop là mãi mãi. Cảm ơn shop nhé!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 11, 'point' => 5, 'comment' => 'Hàng đóng gói cẩn thận. Như hình của shop. M chưa dùng nên k biết cháy đủ 2h không. Hy vọng chất lượng tốt!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['account_id' => 2, 'product_id' => 12, 'point' => 5, 'comment' => 'Sản phẩm tuyệt vời, giao hành nhanh, sẽ ủng hộ shop tiếp', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 12, 'point' => 5, 'comment' => 'Chưa đốt thử không biết cháy lâu không nhưng nến xinh lắm nha. Shop rất lịch sự nữa 10 điểm', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 12, 'point' => 5, 'comment' => 'Dạ em đã nhận được hàng rồi, nhân viên bên em cũng đã kiểm hàng đầy đủ. Cảm ơn shop!🙂', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 12, 'point' => 5, 'comment' => 'Đóng gói cẩn thận. Giao hàng nhanh chưa sử dụng chưa có kết quả', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 12, 'point' => 5, 'comment' => 'shop gói hàng chắc chắn, shop gửi lời cảm ơn ngọt ngào ❤️có nhiêu ⭐️ e xin tặng hết ạ, sẽ ủng hộ shop tiếp ạ🥰', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 12, 'point' => 5, 'comment' => 'Shop giao hàng nhanh, dịch vụ chăm sóc khách hàng ok nha, rất là có tâm, sẽ ủng hộ shop lần tiếp theo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 12, 'point' => 5, 'comment' => 'Giao hàng nhanh, hàng chất lượng, đã mua lần thứ 2 của shop rồi.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 12, 'point' => 5, 'comment' => 'Lần thứ 4 mua nến ở shop. Hy vọng chất lượng của shop là mãi mãi. Cảm ơn shop nhé!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 12, 'point' => 5, 'comment' => 'Hàng đóng gói cẩn thận. Như hình của shop. M chưa dùng nên k biết cháy đủ 2h không. Hy vọng chất lượng tốt!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        
            ['account_id' => 2, 'product_id' => 13, 'point' => 5, 'comment' => 'Sản phẩm tuyệt vời, giao hành nhanh, sẽ ủng hộ shop tiếp', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 13, 'point' => 5, 'comment' => 'Chưa đốt thử không biết cháy lâu không nhưng nến xinh lắm nha. Shop rất lịch sự nữa 10 điểm', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 13, 'point' => 5, 'comment' => 'Dạ em đã nhận được hàng rồi, nhân viên bên em cũng đã kiểm hàng đầy đủ. Cảm ơn shop!🙂', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 13, 'point' => 5, 'comment' => 'Đóng gói cẩn thận. Giao hàng nhanh chưa sử dụng chưa có kết quả', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 13, 'point' => 5, 'comment' => 'shop gói hàng chắc chắn, shop gửi lời cảm ơn ngọt ngào ❤️có nhiêu ⭐️ e xin tặng hết ạ, sẽ ủng hộ shop tiếp ạ🥰', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 13, 'point' => 5, 'comment' => 'Shop giao hàng nhanh, dịch vụ chăm sóc khách hàng ok nha, rất là có tâm, sẽ ủng hộ shop lần tiếp theo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 13, 'point' => 5, 'comment' => 'Giao hàng nhanh, hàng chất lượng, đã mua lần thứ 2 của shop rồi.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 13, 'point' => 5, 'comment' => 'Lần thứ 4 mua nến ở shop. Hy vọng chất lượng của shop là mãi mãi. Cảm ơn shop nhé!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 13, 'point' => 5, 'comment' => 'Hàng đóng gói cẩn thận. Như hình của shop. M chưa dùng nên k biết cháy đủ 2h không. Hy vọng chất lượng tốt!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        
            ['account_id' => 2, 'product_id' => 14, 'point' => 5, 'comment' => 'Sản phẩm tuyệt vời, giao hành nhanh, sẽ ủng hộ shop tiếp', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 3, 'product_id' => 14, 'point' => 5, 'comment' => 'Chưa đốt thử không biết cháy lâu không nhưng nến xinh lắm nha. Shop rất lịch sự nữa 10 điểm', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 4, 'product_id' => 14, 'point' => 5, 'comment' => 'Dạ em đã nhận được hàng rồi, nhân viên bên em cũng đã kiểm hàng đầy đủ. Cảm ơn shop!🙂', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 5, 'product_id' => 14, 'point' => 5, 'comment' => 'Đóng gói cẩn thận. Giao hàng nhanh chưa sử dụng chưa có kết quả', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 6, 'product_id' => 14, 'point' => 5, 'comment' => 'shop gói hàng chắc chắn, shop gửi lời cảm ơn ngọt ngào ❤️có nhiêu ⭐️ e xin tặng hết ạ, sẽ ủng hộ shop tiếp ạ🥰', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 7, 'product_id' => 14, 'point' => 5, 'comment' => 'Shop giao hàng nhanh, dịch vụ chăm sóc khách hàng ok nha, rất là có tâm, sẽ ủng hộ shop lần tiếp theo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 8, 'product_id' => 14, 'point' => 5, 'comment' => 'Giao hàng nhanh, hàng chất lượng, đã mua lần thứ 2 của shop rồi.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 9, 'product_id' => 14, 'point' => 5, 'comment' => 'Lần thứ 4 mua nến ở shop. Hy vọng chất lượng của shop là mãi mãi. Cảm ơn shop nhé!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['account_id' => 10, 'product_id' => 14, 'point' => 5, 'comment' => 'Hàng đóng gói cẩn thận. Như hình của shop. M chưa dùng nên k biết cháy đủ 2h không. Hy vọng chất lượng tốt!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
