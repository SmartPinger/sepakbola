<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

            @if (session('success'))
            <div class="alert alert-succes">
                {{session('success')}}
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-error">
                {{session('error')}}
            </div>
            @endif

            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <a href="{{route('post.create')}}" class="btn btn-md btn-success mb-3 float-right">New
                        Post</a>

                        <Table class="table table-bordered mt-1">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Create</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts at $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->status == 0 ? 'draft':'publish'}}</td>
                                    <td>{{$post->created_at->format('d-m-Y')}}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah anda yakin ?');"
                                        action="{{route('post.destroy', $post->id)}}" method="POST">
                                        <a href="{{route('post.edit', $post->id)}}"
                                            class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="4">Data post tidak tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>