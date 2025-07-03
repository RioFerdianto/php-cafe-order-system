<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Daftar Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .order-status {
            font-weight: 600;
        }
        .order-status.pending {
            color: #ffc107;
        }
        .order-status.processing {
            color: #0d6efd;
        }
        .order-status.completed {
            color: #198754;
        }
        .order-status.cancelled {
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <h1 class="mb-4">Daftar Order</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Pelanggan</th>
                        <th>Kontak</th>
                        <th>Menu</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $index => $order)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $order->nama_pelanggan }}</td>
                        <td>{{ $order->kontak }}</td>
                        <td>{{ $order->menu->nama }}</td>
                        <td>{{ $order->jumlah }}</td>
                        <td>Rp {{ number_format($order->menu->harga * $order->jumlah, 0, ',', '.') }}</td>
                        <td>
                            <span class="order-status {{ $order->status }}">
                                @if($order->status == 'pending')
                                    Pending
                                @elseif($order->status == 'processing')
                                    Processing
                                @elseif($order->status == 'completed')
                                    Completed
                                @else
                                    Cancelled
                                @endif
                            </span>
                        </td>
                        <td>
                            <form action="/admin/order/{{ $order->id }}/status" method="POST" class="d-flex gap-2">
                                @csrf
                                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
