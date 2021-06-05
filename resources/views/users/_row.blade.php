<tr>
    <td rowspan="2">{{ $user->id }}</td>
    <th scope="row">{{ $user->name }}</th>
    <td scope="row">{{ $user->email }}</td>
    <td scope="row">{{ $user->phone_number }}</td>

    <td class="text-right">

        <a href="" class="btn btn-outline-secondary btn-sm"><span class="oi oi-eye"></span></a>
        <a href="" class="btn btn-outline-secondary btn-sm"><span class="oi oi-pencil"></span></a>

    </td>
</tr>
<tr class="skills">
    <td colspan="1"><span class="note">Bio: {{Str::limit($user->description)}}</span></td>
</tr>

