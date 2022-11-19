<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('post') }}
        </h2>
    </x-slot>
    <h2>Create new blog</h2>
<form class="w-full max-w-sm" method="POST">
  @csrf
  <label for="title">title:</label><br>
  <input type="text" id="title" name="title"><br>
  <label for="body">body:</label><br>
  <input type="textarea" id="body" name="body" ><br>
  <!-- <label for="image">Image</label><br> -->
  <!-- <input type="file" name="image"><br> -->
  <input type="submit" value="Post">

@if (session()->has('status'))
<div class="mt-5 shadow bg-purple-500 text-white font-bold py-2 px-4 rounded">
   {{session('status')}}
</div>
 @endif
</form> 
</body>
</html>

</x-app-layout>
