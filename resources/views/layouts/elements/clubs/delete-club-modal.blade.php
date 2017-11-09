<!-- Delete account modal -->
<div class="modal fade" id="delete-club-modal" tabindex="-1" role="dialog" aria-labelledby="deleteClubModal" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <p class="heading lead">Delete the club ?</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="text-center">
                    <i class="fa fa-remove fa-5x mb-3 animated rotateIn"></i>
                    <p>You are going to destroy your club and all trophies and stats. Remember this action cannot be undone.
                    <span class="font-bold">Club will be completely destroyed.</span> </p>
                    <h4 class="font-bold">Are you sure you want to destroy your club ?</h4>
                </div>
            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <a type="button" class="btn btn-primary-modal" data-dismiss="modal">No</a>
                <a id="user-delete" type="button" class="btn btn-outline-secondary-modal waves-effect">
                    Yes, I want to destroy my club
                </a>
            </div>
        </div>
    </div>
</div>

<form id="user-delete-form" method="POST" action="{{ route('club-destroy', $club->id) }}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
</form>