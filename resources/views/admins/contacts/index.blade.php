@extends('admins.layout')
@extends('admins.partials._body')
@extends('admins.partials._navbar')
@extends('admins.partials._settings-panel')
@extends('admins.partials._sidebar')
@extends('admins.partials._footer')

@section('page-title') Contacts @endsection
@section('contacts-link-active') active @endsection
@section('all-contacts-link-active') active @endsection

@section('main')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Our new messages</h4>
        @if(Session::has('success'))
            <div class="col-12 mb-2 alert-success rounded-3 p-2">
                <p class="mb-0 lh-base">{{Session::get('success')}}</p>
            </div>
        @endif

        @if($errors->any())
            <div class="col-12 mb-2 alert-danger rounded-3 p-2">
                @foreach ($errors->all() as $error)
                <p class="mb-0 lh-base">{{ $error }}</p>
                @endforeach
            </div>
        @endif
        
        <div class="accordion" id="accordionExample">
          
          @foreach ($contacts as $count => $contact)
          <div class="card">
            <div class="card-header bg-dark p-2 d-flex justify-content-between" id="headingOne">
              <h2 class="mb-0 flex-grow-1">
                <button class="btn btn-link btn-block text-left collapsed text-white text-decoration-none" type="button" data-toggle="collapse" data-target="#collapse{{$contact->id}}" aria-expanded="false" aria-controls="collapse{{$contact->id}}">
                  {{$contact->name}} ({{$contact->email}})
                </button>
              </h2>
              <div class="px-2">
                <button type="button" class="btn btn-danger btn-rounded btn-icon ml-2" data-bs-toggle="modal" data-bs-target="#deleteContact{{$contact->id}}">
                    <i class="mdi mdi-delete"></i>
                </button>
                <div class="modal fade" id="deleteContact{{$contact->id}}" tabindex="-1" aria-labelledby="deleteContactTitle{{$contact->id}}" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="deleteContactTitle{{$contact->id}}">Delete <span class="text-primary">{{$contact->name}}</span></h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <p>Are you sure, you want to delete this contact?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <form method="POST" action="{{route("contact.delete")}}">
                            @csrf
                            @method("DELETE")
                            <input type="hidden" name="id" value="{{$contact->id}}">
                            <button type="submit" class="btn btn-danger btn-icon">Confirm Delete</a>
                          </form>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
        
            <div id="collapse{{$contact->id}}" class="collapse" aria-labelledby="heading{{$contact->id}}" data-parent="#accordionExample">
              <div class="card-body py-2 mb-0">
                <?= nl2br(htmlspecialchars($contact->message)) ?>
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </div>
</div>
@endsection