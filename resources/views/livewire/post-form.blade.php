<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="container">
        <div class="row">
            <div class="col-3">
                <form action="" method="POST" wire:submit.prevent="save">
                    <div class="mb-3">
                        <label for="">Title:</label>
                        <input type="text" name="title" wire:model="title" placeholder="Enter your title... " class="form-control">
                        @error('title')
                            <span class="text danger small">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Content</label>
                        <textarea name="content" wire:model="content" id="" cols="30" rows="10" class="form-control"></textarea>
                        @error('content')
                            <span class="text danger small">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb">
                        <input type="submit" class="btn btn-success w-100">
                    </div>
                </form>
            </div>
            <div class="col-9">
                @if(session()->has('msg'))
                    <div class="alert alert-success">
                        {{session('msg')}}
                    </div>
                @endif
                @if(session()->has('ErrorMsg'))
                    <div class="alert alert-danger">
                        {{session('ErrorMsg')}}
                    </div>
                @endif
                <table class="table">
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>content</th>
                        <th>action</th>
                    </tr>

                    @foreach ($posts as $p )
                    <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->title}}</td>
                        <td>{{$p->content}}</td>
                        <td>
                            <button type="button" wire:click="deletePost({{$p->id}})" class="btn btn-danger">X</button>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
