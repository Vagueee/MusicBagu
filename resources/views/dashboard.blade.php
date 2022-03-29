<style>
div.gallery:hover {
    border: 1px solid #777;
  }
  
  div.gallery img {
    width: 20%;
    height: auto;
  }
  
  div.desc {
    padding: 15px;
    text-align: center;
  }
</style>

<script src="https://kit.fontawesome.com/04cf680cbc.js" crossorigin="anonymous"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Musicia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @foreach($musics as $music)
            <div class="gallery">
                <a href="/music/{{ $music->id }}/detail">
                    <div class="desc">
                        <i class="fa-solid fa-music"></i> {{$music->title}}<br>
                        <i class="fa-solid fa-user"></i> {{$music->artist}}
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</x-app-layout>