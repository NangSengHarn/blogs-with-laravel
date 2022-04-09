<x-layout>
  <x-slot name="title">
    All Blogs
  </x-slot>
  @if (session('success'))
  <div class="alert alert-success text-center">
    {{session('success')}}
  </div>
  @endif
  <x-hero />
  <x-blogs-section
  :blogs="$blogs" />

</x-layout>

