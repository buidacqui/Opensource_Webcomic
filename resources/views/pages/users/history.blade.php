<center><h2>LỊCH SỬ XEM</h2></center>

<div class="container mt-4">
    <div class="d-flex justify-content-center">
        <div class="table-responsive" style="width: 100%; max-width: 1200px;">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Tên truyện</th>
                        <th scope="col">Chương</th>
                        <th scope="col">Thời gian đọc</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($lichsu as $item)
                        <tr>
                            <td>
                                @if ($item->truyen)
                                    <a href="{{ url('xem-truyen/' . $item->truyen->slug_truyen) }}" class="text-decoration-none">
                                        {{ $item->truyen->tentruyen }}
                                    </a>
                                @else
                                    <span class="text-danger">[Truyện đã bị xóa]</span>
                                @endif
                            </td>
                            <td>
                                @if ($item->chapter)
                                    <a href="{{ url('xem-chapter/' . $item->chapter->slug_chapter) }}" class="text-decoration-none">
                                        {{ $item->chapter->tieude }}
                                    </a>
                                @else
                                    <span class="text-danger">[Chương đã bị xóa]</span>
                                @endif
                            </td>
                            <td>
                                {{ $item->created_at ? $item->created_at->format('d/m/Y H:i') : 'Không xác định' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">
                                <div class="alert alert-info mb-0">Bạn chưa đọc truyện nào.</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Thêm phân trang -->
            <div class="d-flex justify-content-center mt-3">
            {{ $lichsu->links('pagination::bootstrap-4') }}
            </div>

        </div>
    </div>
</div>

<style>
    .table thead {
        background-color: #f8f9fa;
        font-weight: bold;
        color: #495057;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f2f2f2;
    }

    .table th, .table td {
        vertical-align: middle;
        text-align: center;
        padding: 12px 15px;
    }

    /* Cải thiện hiển thị các liên kết */
    .text-primary {
        color: #007bff !important;
        font-weight: bold;
    }

    .text-danger {
        color: #dc3545 !important;
    }

    .container {
        max-width: 80%;
        margin: 0 auto;
    }

    h2 {
        font-size: 2rem;
        font-weight: bold;
    }

    /* Cải thiện hiển thị của bảng */
    .table-responsive {
        margin-top: 20px;
        overflow-x: auto;
    }

    .table {
        width: 100%;
        max-width: 1200px;
        border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    background-color: #f3f3f3;

    }
</style>
