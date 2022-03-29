<title>{{$music->title}}</title>

<style>
table{
    margin-bottom: 30px;
}

h5, ul, li, a, div{
    font-family: Arial, Helvetica, sans-serif;
    text-decoration: none;
}

li {
  float: center;
}

li a {
  display: block;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
}

.flex{
    display: flex;
    align-items: center;
    text-align: center;
    justify-content: center;
}

.flex-container{
    width: 50%;
    background-color: #ffffff;
    text-align: center;
    font-family: Arial, Helvetica, sans-serif;
    border-style: outset; 
}
    
.text{
    width: 100%;
    height: 30%;
    border-style: inset;
}

textarea{
    width: 100%;
    height: 100px;
    border-style: inset;
    resize: none;
}

.back {
    float: left;
    text-decoration: none;
    background-color: white;
    color: black;
    border: 2px solid #000000;
    border-radius: 5px;
}

.edit {
    float: right;
    text-decoration: none;
    background-color: white;
    color: black;
    border: 2px solid #ffee00;
    border-radius: 5px;
}

.delete {
    float: right;
    text-decoration: none;
    background-color: white;
    color: black;
    border: 2px solid #ff0000;
    border-radius: 5px;
}

.back:hover {
    background-color: #000000;
    color: white;
}

.edit:hover {
    background-color: #ffee00;
    color: white;
}

.delete:hover {
    background-color: #ff0000;
    color: white;
}

.btn {
    text-decoration: none;
    background-color: white;
    color: black;
    border: 2px solid #000000;
    border-radius: 5px;
}

.btn:hover {
    background-color: #000000;
    color: white;
}

.buttons {
  color: white; /* White text */
  padding: 10px 24px; /* Some padding */
  cursor: pointer; /* Pointer/hand icon */
  float: center; /* Float the buttons side by side */
}

</style>

<script src="https://kit.fontawesome.com/04cf680cbc.js" crossorigin="anonymous"></script>

<div class="flex">
    <div class="flex-container">
        <div class="buttons">
            <ul>
                <a class="back" href="/dashboard"> <i class="fa-solid fa-angle-left"></i> Kembali </a>
                <form action="/music/{{$music->id}}" method="POST">
                @csrf
                    @method("DELETE")
                    <button type="submit" class="delete"><i class="fa-solid fa-trash-alt"></i> Delete </button> 
                </form>
                <br>
                <a class="edit" href="/music/{{$music->id}}/edit"> <i class="fa-solid fa-pen-to-square"></i> Edit </a>
            </ul>
        </div>
        <table class="flex">
            <td>
            <h3><i class="fa-solid fa-music"></i> {{$music->title}}</h3>
            <h4><i class="fa-solid fa-user"></i> {{$music->artist}}</h4>
            <br><br>
                
            <audio controls play stop> 
                <i class="fa-solid fa-circle-play"></i>
                <source src="{{ asset('/storage/audio/' . $music->audio)}}" alt="{{$music->audio}}">
            </audio>
            <br><br>

            <h4>Lyrics :</h4>
            {{$music->lyrics}}
            
            </td>
        </table>
    </div>
</div>