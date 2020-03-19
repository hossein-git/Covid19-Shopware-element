{block name="widgets_emotion_components_ariya_coid19"}
    <div class="emotion--html" style="">
        <table style="min-width: 100%;border-collapse: collapse;">
            <thead>
            <tr>
                <td style="background-color: yellow;color: black">All Cases: {number_format($Data.allCases.cases)}</td>
                <td style="background-color: red">Total Deaths: {number_format($Data.allCases.deaths)}</td>
                <td style="background-color: green">All Recovered: {number_format($Data.allCases.recovered)}</td>
            </tr>

            </thead>
            <tbody></tbody>
        </table>

        <div class="html--content">
            <table class="" style="min-width: 100%;border-collapse: collapse;">
                <thead>
                <tr>
                    <td>Country Name</td>
                    <td style="background-color:#ee8d10;color: black">Cases</td>
                    <td>Today Cases</td>
                    <td style="background-color:darkred">Deaths</td>
                    <td style="background-color:red">Today Deaths</td>
                    <td style="background-color:green">Recovered</td>
                    <td>Critical</td>
                </tr>
                </thead>
                <tbody>
                {foreach $Data.allCountries as $country}
                    <tr>
                        <td><b>{$country.country}</b></td>
                        <td style="color: #ee8d10">{number_format($country.cases)}</td>
                        <td style="color: #eebc10">{number_format($country.todayCases)}</td>
                        <td style="color: darkred">{number_format($country.deaths)}</td>
                        <td style="color: red">{number_format($country.todayDeaths)}</td>
                        <td style="color: green">{number_format($country.recovered)}</td>
                        <td>{number_format($country.critical)}</td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
        </div>

    </div>
{/block}