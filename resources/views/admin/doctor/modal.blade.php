<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $doctor->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
              <img class="table-user-thumb" src="{{ asset('images') }}/{{ $doctor->image }}" width="200">
          </p>
          <p class="badge badge-pill badge-dark">Role: {{ $doctor->role->name }}</p>
          <p>Name:         {{ $doctor->name }}</p>
          <p>Gender:       {{ $doctor->gender }}</p>
          <p>Email:        {{ $doctor->email }}</p>
          <p>Address:      {{ $doctor->address }}</p>
          <p>Phone number: {{ $doctor->phone_number }}</p>
          <p>Department:   {{ $doctor->department }}</p>
          <p>Education:    {{ $doctor->education }}</p>
          <p>About:        {{ $doctor->description }}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
