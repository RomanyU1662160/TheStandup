<template>

  <ais-instant-search :search-client="searchClient" index-name="indexusers">   <!-- name of index on Algolia  -->
    <!-- Other search components go here -->
    <div class="form-group">
      <!--indices is the name of index in Algolia -->
      <ais-autocomplete :indices="indexteams">
        <template slot-scope="{ currentRefinement, indices, refine }">
          <input
            class="form-control"
            type="search"
            :value="currentRefinement"
            placeholder="Search any thing "
            @input="refine($event.currentTarget.value)"
            autofocus
          />
          <div v-if="currentRefinement">
            <div v-for="index in indices" :key="index.id">
              <div class="card" v-for="hit in index.hits" :key="hit.objectID">
                <ais-highlight attribute="fname"  :hit="hit" />
                <!-- search results  -->
                <p class="text-info">      
                   {{ fname }}
                </p>
                <!-- end of search results -->
                <!-- <h3 class="card-title" attribute="name" :hit="hit"></h3> -->
              </div>
            </div>
          </div>
        </template>
      </ais-autocomplete>
    </div>
    <!-- End of Other search components -->
  </ais-instant-search>
</template>

<script>
import algoliasearch from "algoliasearch/lite";

export default {
  data() {
    return {
      searchClient: algoliasearch(
        process.env.MIX_ALGOLIA_APP_ID,
        process.env.MIX_ALGOLIA_SEARCH
      )
    };
  }
};
</script>