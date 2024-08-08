@foreach ($qrCodeAll as $qrCode)
<tr>
    <td>
        <a href="{{ $qrCode->data }}" class="popup-image">
            <img src="{{ $qrCode->data }}">
        </a>
    </td>
    <td>{{ $qrCode->title }}</td>
    <td>{{ $qrCode->type }}</td>
    <td>
        <a href="{{ route('qrcode.edit', $qrCode->id) }}" class="btn btn-warning btn-sm">
            <i class="fa fa-edit"></i> Düzenle
        </a>
        <a href="{{ route('qrcode.delete', $qrCode->id) }}"
            class="btn btn-danger btn-sm delete-qr-table" data-title="{{ $qrCode->title}}">
            <i class="fa fa-trash"></i> Sil
        </a>
    </td>
</tr>
@endforeach
