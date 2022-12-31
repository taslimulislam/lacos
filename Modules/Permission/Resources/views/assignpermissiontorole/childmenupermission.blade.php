
<table class="table">

    <tbody>

        @forelse ( $perMenu->where('parentmenu_id',$permissionMenuName->id) as $childKye => $childPerMenu)
        <tr>
        <td>

           <td> {{__('language.'.$childPerMenu->menu_name)}}</td>

            @forelse ($childPerMenu->permission as $cpkye => $cpermissionName )

                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $cpermissionName->id }}" {{ ($roleHasPermission->contains($cpermissionName->name)) ? "checked" : "" }} />
                        <label class="form-check-label" for="flexCheckDefault">
                            {{__('language.'.$cpermissionName?->name)}}
                        </label>
                      </div>
                </td>
                       @include('permission::assignpermissiontorole.secondchildmenupermission')

            @empty

            @endforelse


        </td>
        </tr>
        @empty



        @endforelse


    </tbody>
  </table>





