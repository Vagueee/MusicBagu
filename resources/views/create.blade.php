<style>
    .flex{
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .flex-container{
        width: 50%;
        background-color: #ffffff;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        border-style: outset; 
    }

    textarea{
        resize: none;
    }
    
</style>

<title>Add Music</title>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="flex">
    <div class="flex-container">
        <h3>Add Music<h3>
        <form action="/dashboard" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title">
            <br><br>    
            
            <label for="artist" class="form-label">Artist</label>
            <input type="text" name="artist" class="form-control" id="artist">
            <br><br>
            
            <label for="lyrics" class="form-label">Lyrics</label>
            <textarea type="text" name="lyrics" class="form-control" id="lyrics"></textarea>
            <br><br>
            
            <label for="audio" class="form-label">Audio</label>
            <input type="file" name="audio" class="form-control" id="audio">
            <br><br>

            <button class="btn" type="submit">Add</button>
        </form>
    </div>
</div>