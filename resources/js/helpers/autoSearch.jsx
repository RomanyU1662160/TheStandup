import autocomplete from 'autocomplete.js';
import alogoliasearch from 'algoliasearch';


//define algolia api keys
const algoliaClient = alogoliasearch(
    process.env.MIX_ALGOLIA_APP_ID,
    process.env.MIX_ALGOLIA_SEARCH);

const autoSearch = (tableName, inputName = "#search", hitsNumber = 10) => {
    const index = algoliaClient.initIndex(tableName);
    return autocomplete(inputName, { hint: true }, [{
        source: autocomplete.sources.hits(index, { hitsPerPage: hitsNumber }),
        displayKey: 'search',
        templates: {
            suggestion: function (suggestion) {
                // return '<p class="text-info">' + suggestion._highlightResult.team.name.value + ' ' + suggestion._highlightResult.lname.value + '</p>';
                return ` 
        <table class="table table-borderless table-sm border">
            <thead class="bg-info text-white">
                 <tr class=""> <td class= ""> <a href="${route('member.page', suggestion.id)}"class="text-white" > <h4 class= "card-title">   ${suggestion._highlightResult.fname.value + ' ' + suggestion._highlightResult.lname.value} </h4> </a>  </td> <td> </td> </tr>
            </thead>

            <tr>
                <th> working on :</th>
                <td> ${suggestion._highlightResult.days.map((day) => {
                   
                    return "<span class= 'text-info'>" + day.name.value + ', ' + "</span>"
                })}
                </td>
            </tr>
            
            <tr>
                <th>  Role : </th>
                 <td> ${suggestion._highlightResult.role.map((role) => {
                   
                    return "<span class= 'text-info'>" + role.name.value + ', ' + "</span>"
                })}
                 </td>
            </tr>

             <tr>
                 <th> In Team  </th>
                    <td> ${suggestion._highlightResult.team != null ?
                   "<a class='btn btn-link text-primary' href= ' "+ route('team.page',suggestion._highlightResult.team.id.value)  + " ' "  + '>'  +  suggestion._highlightResult.team.name.value + '  <i class="text-info fas fa-info"></i> <a>' : ' not assigned to a team'
                    
                    } 
                    </td>
             </tr>
        </table>
         `
            }
        }
    }])

}

export default autoSearch;