<link rel="stylesheet" type="text/css" href="/Content/font-awesome/css/font-awesome.min.css" />

<div class="container">
    <button id="exportButton" class="btn btn-lg btn-danger clearfix"><span class="fa fa-file-excel-o"></span> Export to Excel</button>

    <table id="exportTable" class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Sue Sharpe</td>
                <td>36</td>
                <td>suesharpe@mitroc.com</td>
            </tr>
            <tr>
                <td>Nieves Hubbard</td>
                <td>45</td>
                <td>nieveshubbard@syntac.com</td>
            </tr>
            <tr>
                <td>Anastasia Underwood</td>
                <td>29</td>
                <td>anastasiaunderwood@gallaxia.com</td>
            </tr>
            <tr>
                <td>Maxine Haley</td>
                <td>32</td>
                <td>maxinehaley@songbird.com</td>
            </tr>
            <tr>
                <td>Bennett Alvarez</td>
                <td>44</td>
                <td>bennettalvarez@marvane.com</td>
            </tr>
            <tr>
                <td>Myrna Ellison</td>
                <td>30</td>
                <td>myrnaellison@zoxy.com</td>
            </tr>
        </tbody>
    </table>
</div>

<!-- you need to include the shieldui css and js assets in order for the components to work -->
<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/jszip.min.js"></script>

<script type="text/javascript">
    jQuery(function ($) {
        $("#exportButton").click(function () {
            // parse the HTML table element having an id=exportTable
            var dataSource = shield.DataSource.create({
                data: "#exportTable",
                schema: {
                    type: "table",
                    fields: {
                        Name: { type: String },
                        Age: { type: Number },
                        Email: { type: String }
                    }
                }
            });

            // when parsing is done, export the data to Excel
            dataSource.read().then(function (data) {
                new shield.exp.OOXMLWorkbook({
                    author: "PrepBootstrap",
                    worksheets: [
                        {
                            name: "PrepBootstrap Table",
                            rows: [
                                {
                                    cells: [
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Name"
                                        },
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Age"
                                        },
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Email"
                                        }
                                    ]
                                }
                            ].concat($.map(data, function(item) {
                                return {
                                    cells: [
                                        { type: String, value: item.Name },
                                        { type: Number, value: item.Age },
                                        { type: String, value: item.Email }
                                    ]
                                };
                            }))
                        }
                    ]
                }).saveAs({
                    fileName: "PrepBootstrapExcel"
                });
            });
        });
    });
</script>

<style>
    #exportButton {
        border-radius: 0;
    }
</style>