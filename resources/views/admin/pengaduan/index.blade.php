@extends('layouts.admin')
@section('title', 'Pengaduan')
@section('page-title', 'Kelola Pengaduan Warga')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr><th>Tanggal</th><th>Pelapor</th><th>WhatsApp</th><th>Isi Laporan</th><th>Foto</th><th>Status</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                    @forelse($pengaduan as $row)
                    @php
                        $statusClass = match($row->status) {
                            'Pending' => 'bg-warning text-dark',
                            'Proses'  => 'bg-info text-dark',
                            'Selesai' => 'bg-success',
                            default   => 'bg-secondary'
                        };
                        $noWaClean = preg_replace('/^0/', '62', $row->no_wa ?? '');
                        $pesanWa = urlencode("Halo {$row->nama}, laporan Anda: '" . Str::limit($row->isi_laporan, 50) . "...' statusnya: *{$row->status}*");
                    @endphp
                    <tr>
                        <td><small>{{ $row->tanggal ? $row->tanggal->format('d/m/Y H:i') : '-' }}</small></td>
                        <td><strong>{{ $row->nama }}</strong></td>
                        <td>
                            @if($row->no_wa)
                                <a href="https://api.whatsapp.com/send?phone={{ $noWaClean }}&text={{ $pesanWa }}" target="_blank" class="btn btn-sm btn-outline-success">
                                    <i class="bi bi-whatsapp me-1"></i>{{ $row->no_wa }}
                                </a>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td style="max-width:200px;"><small>{{ Str::limit($row->isi_laporan, 80) }}</small></td>
                        <td>
                            @if($row->foto)
                                <a href="{{ asset('storage/img/pengaduan/' . $row->foto) }}" target="_blank">
                                    <img src="{{ asset('storage/img/pengaduan/' . $row->foto) }}" width="60" height="50" style="object-fit:cover;border-radius:4px;">
                                </a>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td><span class="badge {{ $statusClass }}">{{ $row->status }}</span></td>
                        <td>
                            {{-- Update Status --}}
                            <div class="dropdown d-inline me-1">
                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown">Ubah Status</button>
                                <ul class="dropdown-menu">
                                    @foreach(['Pending','Proses','Selesai'] as $st)
                                    <li>
                                      <form action="{{ route('admin.pengaduan.updateStatus', $row->id) }}" method="POST" class="d-inline me-1">
    @csrf @method('PATCH')
    <select name="status" onchange="this.form.submit()" class="form-select form-select-sm d-inline-block" style="width:100px;">
        <option value="Pending"  {{ $row->status=='Pending'  ? 'selected' : '' }}>Pending</option>
        <option value="Proses"   {{ $row->status=='Proses'   ? 'selected' : '' }}>Proses</option>
        <option value="Selesai"  {{ $row->status=='Selesai'  ? 'selected' : '' }}>Selesai</option>
    </select>
</form>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <form id="del-pg-{{ $row->id }}" action="{{ route('admin.pengaduan.destroy', $row->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="button" onclick="confirmDelete('del-pg-{{ $row->id }}')" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center text-muted py-4">Tidak ada pengaduan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-2">{{ $pengaduan->links() }}</div>
    </div>
</div>
@endsection
