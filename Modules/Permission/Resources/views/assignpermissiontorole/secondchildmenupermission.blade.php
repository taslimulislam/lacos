
{{-- <table class="table">

    <tbody>

        @forelse ( $perMenu->where('parentmenu_id',$childPerMenu?->id) as $secondchildKye => $secondChildPerMenu)
        <tr>
        <td>

           <td> {{__('language.'.$secondChildPerMenu?->menu_name)}}</td>

            @forelse ($secondChildPerMenu->permission as $seccildpkye => $secondChildpermissionName )

                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $secondChildpermissionName->id }}" {{ ($roleHasPermission->contains($secondChildpermissionName->name)) ? "checked" : "" }} />
                        <label class="form-check-label" for="flexCheckDefault">
                            {{__('language.'.$secondChildpermissionName?->name)}}
                        </label>
                      </div>
                </td>


            @empty

            @endforelse


        </td>
        </tr>
        @empty

        @endforelse


    </tbody>
  </table> --}}



  @forelse ( $perMenu->where('parentmenu_id',$childPerMenu?->id) as $secondchildKye => $secondChildPerMenu)
  <tr>
  <td>

     <td><td> {{__('language.'.$secondChildPerMenu?->menu_name)}}</td></td>

      @forelse ($secondChildPerMenu->permission as $seccildpkye => $secondChildpermissionName )

          <td>
              <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $secondChildpermissionName->id }}" {{ ($roleHasPermission->contains($secondChildpermissionName->name)) ? "checked" : "" }} />
                  <label class="form-check-label" for="flexCheckDefault">
                      {{__('language.'.$secondChildpermissionName?->name)}}
                  </label>
                </div>
          </td>


      @empty

      @endforelse


  </td>
  </tr>
  @empty

  @endforelse
