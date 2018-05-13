@extends('Layouts.CustomLayout.Layout')

@section('CustomTitle')
    About
@endsection

@section('NavBar')AboutNav @endsection

@section('Content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Group Infomation</h3>
        </div>
        <div class="panel-body">
            ENGLISH CHALLENGE
<br><br>
            Web có các chức năng:<br>
            - Trả lời câu hỏi ở các lĩnh vực khác nhau với độ khó khác nhau để tích lũy điểm xếp hạng<br>
            - Người chơi tích lũy đủ điểm nhất định sẽ tăng trình độ<br>
            - Mỗi câu hỏi có một idobject chỉ định câu hỏi phù hợp với trình độ nào của người chơi<br>
            - Trả lời câu hỏi càng khó càng được nhiều điểm<br>
            - Mỗi lần trả lời câu hỏi có 30 giây đễ suy nghĩ<br>
            - Khi trả lời đúng thì sẽ hiện phần giải thích cho câu hỏi<br>
            - Sử dụng Ajax để trả lời câu hỏi để không phải load lại trang<br>
            - Bảng xếp hạng bạn bè và thế giới dựa trên số điểm tích lũy<br>
            - Có thể kết bạn bằng cách vào bảng xếp hạng click Add friend<br>
            - Chức năng chat với người đã kết bạn giao lưu chia sẻ kiến thức<br><br>

            - Tài khoản Admin:<br>
            username: danghao<br>
            password: admin<br>
            - Admin có thể truy cập vào trang quản lý dữ liệu như thêm câu hỏi, thêm và xóa loại câu hỏi (Type), thêm và xóa độ khó của câu hỏi (Level), thêm và xóa trình độ người chơi (Object)
            <br><br>
            - Có thể đăng ký tài khoản mới bằng username và email, username và email phải là duy nhất, không trùng với các tài khoản đã có<br>
            - Khi đăng ký tài khoản có thể đính kèm ảnh đại diện, anh lưu trực tiếp vào database, và hiển thị trên danh sách bạn bè<br>
        </div>
    </div>
@endsection
