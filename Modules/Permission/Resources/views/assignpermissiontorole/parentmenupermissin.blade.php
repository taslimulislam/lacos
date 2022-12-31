
<table class="table">

    <tbody>
      <tr>
        <th>{{__('language.'.$permissionMenuName?->menu_name)}} </th>

        @forelse ($permissionMenuName->permission as $pkye => $permissionName )
            <td>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permissionName->id }}"  {{ ($roleHasPermission->contains($permissionName->name)) ? "checked" : "" }}/>
                    <label class="form-check-label" for="flexCheckDefault">
                        {{__('language.'.$permissionName?->name)}}
                    </label>
                  </div>

            </td>

        @empty

        @endforelse

      </tr>
      @include('permission::assignpermissiontorole.childmenupermission')
    </tbody>
  </table>
