<link rel="stylesheet" href="{{ asset('css/kitchen/reportsForm.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


<form action="{{ route('kitchen.reports.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="mb-3">
    <label for="ingredientName" class="form-label">Ingredient Name:</label>
    <input type="text" name="ingredientName" id="ingredientName" class="form-control" placeholder="Enter ingredient name">
</div>

<div class="mb-3">
    <label for="weekCategory" class="form-label">Week Category:</label>
    <select name="weekCategory" id="weekCategory" class="form-select">
        <option value="" disabled selected>Select a week</option>
        <option value="week1&3">Week 1 & 3</option>
        <option value="week2&4">Week 2 & 4</option>
    </select>
</div>

<div class="mb-3">
    <label for="dateRange" class="form-label">Date Range:</label>
    From:
    <input type="date" name="dateRange" id="dateRange" class="form-control">

    To:
    <input type="date" name="dateRangeTo" id="dateRangeTo" class="form-control">
</div>

<div class="mb-3">
    <label for="quantity" class="form-label">Quantity:</label>
    <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Enter quantity">
</div>


<div class="mb-3">
    <label for="ingredientReport" class="form-label">Reasons for Report:</label>
    <select name="ingredientReport" id="ingredientReport" class="form-select">
        <option value="low_stock">Low Stock</option>
        <option value="expired">Expired</option>
        <option value="damaged">Damaged</option>
        <option value="quality_issue">Quality Issue</option>
        <option value="other">Other</option>
    </select>
</div>

<div class="mb-3">
    <label for="additionalNotes" class="form-label">Additional Notes:</label>
    <textarea name="additionalNotes" id="additionalNotes" class="form-control" rows="4" placeholder="Enter any additional notes here"></textarea>
</div>

<div class="mb-3">
    <label for="reportImage" class="form-label">Upload Image:</label>
    <input type="file" name="reportImage" id="reportImage" class="form-control">
</div>

<button type="submit" class="btn btn-success">Submit</button>

<a href="{{ route('kitchen.reports') }}" class="btn btn-primary ms-2">
    <i class="fas fa-download fa-sm me-1 text-white-50"></i> Back to Reports
</a>

</form>
