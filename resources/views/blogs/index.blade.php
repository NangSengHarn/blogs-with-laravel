<x-layout>
  <x-slot name="title">
    <title>All Blogs</title>
  </x-slot>
  @if (session('success'))
  <div class="alert alert-success text-center">
    {{session('success')}}
  </div>
  @endif
  <x-hero />
  <x-blogs-section 
  :blogs="$blogs" />
  <x-subscribe/>
    
</x-layout>    

