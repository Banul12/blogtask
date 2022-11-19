<h1> data list </h>

<table>
     <thead>
        
  <tr>
    <th>User ID</th>
    <th>ID</th>
    <th>Title</th>
    <th>Body</th>
  </tr>
</thead>
<tbody>
    @foreach ($data as $data)
   <tr>
   <td class="px-6 py-4 whitespace-nowrap">{{$data->userId}}</td>
   <td class="px-6 py-4 whitespace-nowrap">{{$data->id}}</td>
   <td class="px-6 py-4 whitespace-nowrap">{{$data->title}}</td>
   <td class="px-6 py-4 whitespace-nowrap">{{$data->body}}</td>
   </td>
  </tr>
  @endforeach
</tbody>
</table>