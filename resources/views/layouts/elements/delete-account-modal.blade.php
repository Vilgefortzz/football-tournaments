<!-- Delete account modal -->
<div class="modal fade" id="delete-account-modal" tabindex="-1" role="dialog" aria-labelledby="deleteAccountModal" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <p class="heading lead">Delete an account ?</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="text-center">
                    <i class="fa fa-remove fa-5x mb-3 animated rotateIn"></i>
                    <p>You are going to delete your account. Remember this action cannot be undone.
                    <span class="font-bold">Account will be completely removed.</span> </p>
                    <h4 class="font-bold">Are you sure you want to delete your account ?</h4>
                </div>
            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <a type="button" class="btn btn-primary-modal" data-dismiss="modal">No</a>
                <a id="user-delete" type="button" class="btn btn-outline-secondary-modal waves-effect">
                    Yes, I want to delete my account
                </a>
            </div>
        </div>
    </div>
</div>

<form id="user-delete-form" method="POST" action="{{ route('user-destroy', Auth::user()->id) }}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
</form>