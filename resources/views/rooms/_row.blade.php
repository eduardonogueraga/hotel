<tr>
    <td rowspan="2">{{ $room->id }}</td>
    <th scope="row">{{ $room->home_type }}</th>
    <td scope="row">{{ $room->room_type }}</td>
    <td scope="row">{{ $room->total_bedrooms }}</td>
    <td scope="row">{{ $room->total_bathrooms }}</td>
    <td scope="row">{{ $room->address }}</td>
    <td scope="row">{{ $room->price }}</td>

    <td class="text-right">

        <a href="" class="btn btn-outline-secondary btn-sm"><span class="oi oi-eye"></span></a>
        <a href="" class="btn btn-outline-secondary btn-sm"><span class="oi oi-pencil"></span></a>

    </td>
</tr>
<tr class="skills">
    <td colspan="1"><span class="note">Descripcion: {{Str::limit($room->summary)}}</span></td>
</tr>

