@extends('layouts.app')

<style  type="text/css">
    .tabs_block{
  display: none;
}  
.profile_tab{
  cursor: pointer;
}
.tabs_block_active{
  display: block !important;
}

/* profile scrtion */
.profiles_wrapper {
  display: grid;
  grid-template-rows: auto;
  grid-template-columns: minmax(230px,300px) 1fr;
  grid-gap: 15px;
}
.profile_section {
  padding: 2rem 0;
}

/* profile scrtion */

/* sidebar section */
.profiles_sidebar {
  border: 1px solid #bfbdbd;
  border-radius: 10px;
  overflow: hidden;
  height: max-content;
}
.profiles_sidebar_wrapper > .profiles_sidebar_title {
  padding: 5px;
  background-color: #e5e5e5;
  text-align: center;
}
.profiles_sidebar_title > img{
  width: 30px;
  border-radius: 50%;
  height: 30px;
}
.profile_tab:nth-last-child(1) {
  border-bottom: none;
}
.profile_tab {
  padding: 8px 15px;
  color: #444;
  transition: 0.3s all ease-in-out;
  -webkit-transition: 0.3s all ease-in-out;
  -moz-transition: 0.3s all ease-in-out;
  -ms-transition: 0.3s all ease-in-out;
  -o-transition: 0.3s all ease-in-out;
  font-size: 14px;
  text-transform: capitalize;
  font-weight: 600;
  border-bottom: 1px solid #f0f0f0;
}
.profile_tab:hover,
.profile_tab.profile_tab_active {
  background-color: #8a368c;
  color: white;
}

/* sidebar section */

/* right sidebar section */
.tabs_block_wrapper {
  border: 1px solid #bfbdbd;
  border-radius: 10px;
  overflow: hidden;
}
.tabs_block_wrapper_title > h3 {
  margin-bottom: 0;
  padding: 8px 15px;
  background-color: #e5e5e5;
  font-size: 16px;
  text-transform: capitalize;
  font-weight: 500;
  color: #444;
  font-family: 'open sans',sans-serif;
  letter-spacing: 0.25px;
}
.tabs_block_wrapper_content {
  padding: 15px;
}
.inputprofile_group {
  margin-bottom: 10px;
  position: relative;
}
.inputprofile_group > label {
  font-size: 12px;
  font-weight: 600;
  letter-spacing: 0.25px;
  font-family: 'open sans',sans-serif;
  text-transform: uppercase;
  color: #959595;
  margin-bottom: 5px;
}
.inputp_group > .inputp_group_control {
  padding: 6px 15px;
  width: 100%;
  border: 1px solid #bfbdbd;
  border-radius: 5px;
  outline: none;
}
.inputp_group > input[type="color"].inputp_group_control {
  width: 60px;
  padding: 2px;
  border-radius: 2px;
}
.middle_header > h3 {
  font-weight: 600;
  text-transform: capitalize;
  font-size: 20px;
  font-family: 'open sans',sans-serif;
  letter-spacing: 0.25px;
  margin: 10px 0;
  color: #444;
}
.inputp_group_info{
  margin: 10px 0 20px;
}
.inputp_group_info > p {
  font-family: 'open sans',sans-serif;
  letter-spacing: 0.25px;
  color: #444;
  font-size: 14px;
  font-weight: 600;
  margin-bottom: 5px; 
}
.inputp_group > input[type="submit"].inputp_group_control {
  color: white;
  background-color: #8a368c;
  font-size: 16px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.25px;
  font-family: 'open sans',sans-serif;
}
.tabs_deleteblock_wrapper {
  margin-top: 20px;
}
.tabs_deleteblock_wrapper > .tabs_block_wrapper_title > h3 {
  margin-bottom: 0;
  padding: 8px 15px;
  background-color: #f2dede;
  font-size: 16px;
  text-transform: capitalize;
  font-weight: 500;
  color: #d9534f;
  font-family: 'open sans',sans-serif;
  letter-spacing: 0.25px;
}
.tabs_deleteblock_wrapper .inputpdelete_group > input[type="submit"].inputp_group_control {
  background-color: #d9534f;
  display: inline-block;
  width: auto;
  font-size: 16px;
}
.network_msg > p {
  padding: 8px 15px;
  text-align: center;
  color: white;
  font-family: 'open sans',sans-serif;
  letter-spacing: 0.25px;
  background-color: #8a368c;
  border-radius: 5px;
  text-transform: capitalize;
}
.network_connect_block {
  display: block;
}
.network_connect_block .network_con_block:nth-last-child(1) {
  border-bottom: none;
}
.network_connect_block .network_con_block {
  border-bottom: 1px solid #bfbdbd;
}
.network_con_block {
  display: flex;
  justify-content: space-between;
  padding: 5px 0;
  align-items: center;
}
.network_icon_block {
  display: flex;
  align-items: center;
}
.network_icon_block > .network_icon {
  font-size: 30px;
  margin-right: 5px;
}
.network_icon_block > .network_text {
  font-family: 'open sans',sans-serif;
  color: #444;
  letter-spacing: 0.25px;
}
.network_con_block:nth-child(1) > .network_icon_block > .network_icon {
  color: #3b5999;
}
.network_con_block:nth-child(2) > .network_icon_block > .network_icon {
  color: #e4405f;
}
.network_con_block:nth-child(3) > .network_icon_block > .network_icon {
  color: #55acee;
}
.network_con_block:nth-child(4) > .network_icon_block > .network_icon {
  color: #dd4b39;
}
.network_btn_block > a {
  padding: 5px 15px;
  background-color: #8a368c;
  color: white;
  border-radius: 5px;
  text-transform: capitalize;
  text-decoration: none;
  outline: none;
  font-family: 'open sans',sans-serif;
  letter-spacing: 0.25px;
}
/* right sidebar section */
</style>

@section('content')
@include('nav')

<div class="profile_section">
  <div class="fix_container">
    <div class="profiles_wrapper">
      <div class="profiles_sidebar">
        <div class="profiles_sidebar_wrapper">
          <div class="profiles_sidebar_title">
            @if($getData->count() !=0 && $getData[0]->profile_image != null)
            <img src="media/{{$getData[0]->profile_image}}" style="width: 150px; height:170px;" alt="Profile" />
            @else
            <img src="media/profile-pic.jpg" width="100" alt="Profile" />
            @endif
          </div>
          <ul class="profiles_sidebar_tab">
            <li class="profile_tab profile_tab_active" id="p_tab1" onclick="profile_tabs(this.id)">profile</li>
            <li class="profile_tab" id="p_tab2" onclick="profile_tabs(this.id)">account</li>
            <li class="profile_tab" id="p_tab3" onclick="profile_tabs(this.id)">links</li>
            <li class="profile_tab" id="p_tab4" onclick="profile_tabs(this.id)">statistics</li>
            <li class="profile_tab" id="p_tab5" onclick="profile_tabs(this.id)">networks</li>
          <li class="profile_tab"><a href="{{route('get-this-user-profile', Auth::user()->name)}}" style="color:black;"> view profile</a></li>
            {{-- <li class="profile_tab" id="p_tab6" onclick="profile_tabs(this.id)">view profile</li> --}}
          </ul>
        </div>
      </div>
      <div class="profiles_content_bar">
        <div class="profile_tabs_wrapper tabs_block p_tab1 tabs_block_active">
          <div class="tabs_block_wrapper">
            <div class="tabs_block_wrapper_title">
              <h3>profile setting</h3>
            </div>
            <div class="tabs_block_wrapper_content">
              @if (session()->has('message'))
                <div class="alert alert-{{ session()->get('type') }} alert-dismissable">
                    {{ session()->get('message') }}
                </div>
              @endif 
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              @if($getData->count() == 0)
                  <form action="{{route('save-profile-data')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="inputprofile_group">
                      <label>name</label>
                      <div class="inputp_group">
                      <input type="text" name="user_name" class="inputp_group_control"/>
                        <input type="hidden" name="authId" value="{{Auth::user()->id}}" required>
                        @error('user_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                      </div>
                    </div>
                    <div class="inputprofile_group">
                      <label>location</label>
                      <div class="inputp_group">
                      <input type="text" name="user_location" class="inputp_group_control" />
                        @error('user_location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                      </div>
                    </div>
                    <div class="inputprofile_group">
                      <label>file</label>
                      <div class="inputp_group">
                        <input type="file" name="user_image" class="inputp_group_control" />
                      </div>
                      <div class="inputp_group_info">
                        <p>image over 600px X 600px work best</p>
                        <p>no adult or pornographic images, this will result in account deletion</p>
                      </div>
                    </div>
                    <div class="inputprofile_group">
                      <label>gravatar email</label>
                      <div class="inputp_group">
                      <input type="email" name="user_gravatar_email" class="inputp_group_control"/>
                      </div>
                    </div>
                    <div class="middle_header">
                      <h3>change your avatar at gravatar.com</h3>
                    </div>
                    <div class="inputprofile_group">
                      <label>bio</label>
                      <div class="inputp_group">
                      <input type="text" name="user_bio" class="inputp_group_control" rows="1">
                      </div>
                    </div>
                    <div class="inputprofile_group">
                      <label>bio text color</label>
                      <div class="inputp_group">
                        <input type="color" name="bio_color" class="inputp_group_control"  />
                      </div>
                    </div>
                    <div class="inputprofile_group">
                      <div class="inputp_group">
                        <input type="submit" name="submit" class="inputp_group_control" value="save" />
                      </div>
                    </div>
                  </form>
              @else
                  <form action="{{route('save-profile-data')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="inputprofile_group">
                      <label>name</label>
                      <div class="inputp_group">
                      <input type="text" name="user_name" class="inputp_group_control" value="{{$getData[0]->user_name}}"/>
                        <input type="hidden" name="authId" value="{{Auth::user()->id}}" required>
                        @error('user_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                      </div>
                    </div>
                    <div class="inputprofile_group">
                      <label>location</label>
                      <div class="inputp_group">
                      <input type="text" name="user_location" class="inputp_group_control"  value="{{$getData[0]->location}}"/>
                        @error('user_location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                      </div>
                    </div>
                    <div class="inputprofile_group">
                      <label>file</label>
                      <div class="inputp_group">
                        <input type="file" name="user_image" class="inputp_group_control" />
                      </div>
                      <div class="inputp_group_info">
                        <p>image over 600px X 600px work best</p>
                        <p>no adult or pornographic images, this will result in account deletion</p>
                      </div>
                    </div>
                    <div class="inputprofile_group">
                      <label>gravatar email</label>
                      <div class="inputp_group">
                      <input type="email" name="user_gravatar_email" class="inputp_group_control" value="{{$getData[0]->gravatar_email}}"/>
                      </div>
                    </div>
                    <div class="middle_header">
                      <h3>change your avatar at gravatar.com</h3>
                    </div>
                    <div class="inputprofile_group">
                      <label>bio</label>
                      <div class="inputp_group">
                      <input type="text" name="user_bio" class="inputp_group_control" rows="1" value="{{$getData[0]->bio}}">
                      </div>
                    </div>
                    <div class="inputprofile_group">
                      <label>bio text color</label>
                      <div class="inputp_group">
                        <input type="color" name="bio_color" class="inputp_group_control"  />
                      </div>
                    </div>
                    <div class="inputprofile_group">
                      <div class="inputp_group">
                        <input type="submit" name="submit" class="inputp_group_control" value="save" />
                      </div>
                    </div>
                  </form>
              @endif
            </div>
          </div>
        </div>
        <div class="profile_tabs_wrapper tabs_block p_tab2">
          <div class="tabs_block_wrapper">
            <div class="tabs_block_wrapper_title">
              <h3>account setting</h3>
            </div>
            <div class="tabs_block_wrapper_content">
              @if($getaccountData->count() == 0)
              <form action="{{route('change-profile-setting')}}" method="POST">
                @csrf
              <input type="hidden" value="{{Auth::user()->id}}" name="userId">
                  <div class="inputprofile_group">
                    <label>email</label>
                    <div class="inputp_group">
                    <input type="email" name="setting_email" class="inputp_group_control inputUserName"/>
                    </div>
                  </div>
                  <div class="inputprofile_group">
                    <label>username</label>
                    <div class="inputp_group">
                    <input type="text" name="setting_username" onkeypress="return AvoidSpace(event)" class="inputp_group_control" />
                    </div>
                  </div>
                  <div class="inputprofile_group">
                    <label>new password</label>
                    <div class="inputp_group">
                      <input type="password" name="setting_password"  class="inputp_group_control" />
                    </div>
                  </div>
                  <div class="inputprofile_group">
                    <label>current password</label>
                    <div class="inputp_group">
                      <input type="password" name="curunt_password" value="" class="inputp_group_control" />
                    </div>
                  </div>
                  <div class="inputprofile_group">
                    <label>private profile (hide in user search)</label>
                    <div class="inputp_group">
                      <select name="setting_public_profile" class="inputp_group_control" >
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                      </select>
                    </div>
                  </div>
                  <div class="inputprofile_group">
                    <div class="inputp_group">
                      <input type="submit" name="submit" class="inputp_group_control" value="save" />
                    </div>
                  </div>
                </form>
              @else
              <form action="{{route('change-profile-setting')}}" method="POST">
                @csrf
              <input type="hidden" value="{{Auth::user()->id}}" name="userId">
                  <div class="inputprofile_group">
                    <label>email</label>
                    <div class="inputp_group">
                    <input type="email" name="setting_email" class="inputp_group_control" value="{{$getaccountData[0]->email}}"/>
                    </div>
                  </div>
                  <div class="inputprofile_group">
                    <label>username</label>
                    <div class="inputp_group">
                    <input type="text" name="setting_username" onkeypress="return AvoidSpace(event)" class="inputp_group_control inputUserName" value="{{$getaccountData[0]->name}}"/>
                    </div>
                  </div>
                  <div class="inputprofile_group">
                    <label>new password</label>
                    <div class="inputp_group">
                      <input type="password" name="setting_password"  class="inputp_group_control" />
                    </div>
                  </div>
                  <div class="inputprofile_group">
                    <label>current password</label>
                    <div class="inputp_group">
                      <input type="password" name="curunt_password" value="" class="inputp_group_control" />
                    </div>
                  </div>
                  <div class="inputprofile_group">
                    <label>private profile (hide in user search)</label>
                    <div class="inputp_group">
                      <select name="setting_public_profile" class="inputp_group_control">
                        @if($getaccountData[0]->is_profile_public == 1)
                          <option value="1" selected>Yes</option>
                          <option value="0" >No</option>
                        @else
                          <option value="1" >Yes</option>
                          <option value="0" selected>No</option>
                        @endif
                        
                      </select>
                    </div>
                  </div>
                  <div class="inputprofile_group">
                    <div class="inputp_group">
                      <input type="submit" name="submit" class="inputp_group_control" value="save" />
                    </div>
                  </div>
                </form>
              @endif
            </div>
          </div>
          <div class="tabs_block_wrapper tabs_deleteblock_wrapper ">
            <div class="tabs_block_wrapper_title">
              <h3>delete account</h3>
            </div>
            <div class="tabs_block_wrapper_content">
              <form action="" method="POST">
                @csrf
              <input type="hidden" value="{{Auth::user()->id}}">
                <div class="inputprofile_group">
                  <p>once you delete you account, there is no going back. it will be deleted forever. please be certain.</p>
                </div>
                <div class="inputprofile_group">
                  <div class="inputp_group inputpdelete_group">
                    <input type="submit" name="submit" class="inputp_group_control" value="Delete Account" />
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="profile_tabs_wrapper tabs_block p_tab3">
          <div class="tabs_block_wrapper">
            <div class="tabs_block_wrapper_title">
              <h3>links</h3>
            </div>
            <div class="tabs_block_wrapper_content">
              @if($getLinks->count() != 0)
                @foreach ($getLinks as $links)
                  <div class="alert alert-info">
                        <strong>{{$links->title}}</strong>
                        <span style="margin-left: 50px;">{{$links->user_links}}</span>
                        <br/><br/>
                  <span style="margin-left: 50px;"><button class="btn btn-info editUserLinkbutton" data-toggle="modal" data-target="#editUserLink" data-title="{{ $links->title }}" data-url="{{$links->user_links}}" data-id="{{ $links->id }}">Edit</button>  <a onclick = "return confirmDelete()" href="{{route('delete-link', $links->id)}}" class="btn btn-danger">Delete</a></span> 
                  </div>
                @endforeach 
              @endif
            <form action="{{route('add-link')}}" method="POST">
              @csrf
            <input type="hidden" name="authUser" value="{{Auth::user()->id}}">
                <div class="middle_header">
                  <h3>Add New Links</h3>
                </div>
                <div class="inputprofile_group">
                  <label>title</label>
                  <div class="inputp_group">
                    <input type="text" name="link_title" class="inputp_group_control" />
                  </div>
                </div>
                <div class="inputprofile_group">
                  <label>link</label>
                  <div class="inputp_group">
                    <input type="url" name="link_url" class="inputp_group_control" />
                  </div>
                </div>
                <div class="inputprofile_group">
                  <div class="inputp_group">
                    <input type="submit" name="submit" class="inputp_group_control" value="save" />
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="profile_tabs_wrapper tabs_block p_tab4">statistics</div>
        <div class="profile_tabs_wrapper tabs_block p_tab5">
          <div class="tabs_block_wrapper">
            <div class="tabs_block_wrapper_title">
              <h3>networks</h3>
            </div>
            <div class="tabs_block_wrapper_content">
              <div class="network_msg">
                <p>you can connect multiple accounts to be able to log in using them</p>
              </div>
              <div class="network_connect_block">
                <div class="network_con_block">
                  <div class="network_icon_block">
                    <span class="network_icon"><i class="fab fa-facebook-square"></i></span>
                    <span class="network_text">Facebook</span>
                  </div>
                  <div class="network_btn_block">
                    <a href="https://www.facebook.com/">Connect</a>
                  </div>
                </div>
                <div class="network_con_block">
                  <div class="network_icon_block">
                    <span class="network_icon"><i class="fab fa-instagram-square"></i></span>
                    <span class="network_text">Instagram</span>
                  </div>
                  <div class="network_btn_block">
                    <a href="https://www.instagram.com/?hl=en">Connect</a>
                  </div>
                </div>
                <div class="network_con_block">
                  <div class="network_icon_block">
                    <span class="network_icon"><i class="fab fa-twitter-square"></i></span>
                    <span class="network_text">Twitter</span>
                  </div>
                  <div class="network_btn_block">
                    <a href="https://twitter.com/home">Connect</a>
                  </div>
                </div>
                <div class="network_con_block">
                  <div class="network_icon_block">
                    <span class="network_icon"><i class="fab fa-google-plus-square"></i></span>
                    <span class="network_text">Google Plus</span>
                  </div>
                  <div class="network_btn_block">
                    <a href="https://myaccount.google.com/profile">Connect</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="profile_tabs_wrapper tabs_block p_tab6">view profile</div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
var profile_vale = '';
function profile_tabs(profile_id){
  var profile_vale = profile_id;
  if($('.'+profile_vale).hasClass('tabs_block')){
    $('.profile_tabs_wrapper').removeClass('tabs_block_active');
    $('.profile_tab').removeClass('profile_tab_active');
    $('.'+profile_vale+'.profile_tabs_wrapper').addClass('tabs_block_active');
    $('#'+profile_vale+'.profile_tab').addClass('profile_tab_active');
  } else if($('.'+profile_vale).hasClass('tabs_block')){
    $('.profile_tabs_wrapper').removerClass('tabs_block_active');
  }
};
</script>

<footer class="page_footer">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page_footer_logo">
          <div class="page_footer_wrapper">
            <a href="index.html"><img src="media/logo_2.png" /></a>
          </div>
        </div>
        <div class="footer_wrapp">
          <ul>
            <li><a href="#">Terms</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Help & Contact</a></li>
            <li><a href="#">AllMyLinks</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
          <!-- Modal -->
<div class="modal fade" id="editUserLink" tabindex="-1" role="dialog" aria-labelledby="editUserLinkLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="editUserLinkLabel">Edit Url</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <form action="{{route('update-users-link')}}" method="POST">
    @csrf
      <div class="modal-body">
        <input type="hidden" name="update_link_id" id="update_link_id" class="update_link_id" required>
        <div class="form-group">
          <label for="">Url Title</label>
          <input type="text" name="link_title_update" id="link_title_update" class="form-control link_title_update" required>
        </div>
        <div class="form-group">
          <label for="">Url</label>
          <input type="text" name="link_url_update" id="link_url_update" class="form-control link_url_update" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
  </div>
</div>
</div>

<script> 
  function confirmDelete()  
  {  
      if(!confirm("Are you sure? You want to delete this?")) 
       {  
           event.preventDefault(); 
      }  
  }
</script>
@endsection