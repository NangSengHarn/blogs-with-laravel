<x-layout>
  <x-slot name="title">
    <title>All Blogs</title>
  </x-slot>
  <x-hero />
  <x-blogs-section 
  :blogs="$blogs" 
  :categories="$categories"
  :currentCategory="$currentCategory??null"/>
  <x-subscribe/>
    
</x-layout>    

