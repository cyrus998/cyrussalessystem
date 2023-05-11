<div class="modal fade" id="periodModal" tabindex="-1" aria-labelledby="periodModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form action="" method="POST">
            @csrf
            @method('POST')
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="periodModalLabel">Report Period</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="startDate">Initial Date</label>
                        <input id="startDate">
                    </div>
                    <div class="mb-3">
                        <label for="endDate">End Date</label>
                        <input id="endDate">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
