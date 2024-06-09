<x-admin.layout title="Create Category">
    <form action="{{ route('admin.categories.store') }}"
          class="col-md-6"
          method="post"
    >
        @csrf
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Create Category</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name"  class="form-control">
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <div style="width: 100px;">
            <button type="submit" class="btn btn-block btn-dark">Save</button>
        </div>
    </form>
</x-admin.layout>

