<template>
  <div class="row">
    <div
      class="col-md-4"
      v-for="item in stores"
      :key="item.id"
    >
      <div class="card mb-3 box-shadow">
        <img
          class="card-img-top"
          data-src="holder.js/100px100?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
          alt="Thumbnail [100%x100]"
          style="height: 100px; width: 100%; display: block"
          src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1852b679c3e%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1852b679c3e%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.71875%22%20y%3D%22120.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
          data-holder-rendered="true"
        />
        <span class="hours"
          >Hoy {{ item.date.to }} - {{ item.date.from }} hrs
        </span>
        <span
          class="delivery"
          v-if="item.delivery"
          >Delivery
        </span>
        <span
          class="delivery"
          v-if="item.delivery == false"
          >Retiro
        </span>
        <div class="pic"></div>
        <div class="card-body">
          <h2>{{ item.name }}</h2>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group"></div>
            <small class="text-muted"
              >{{ item.prod_quantity }}+<BIconsBag
            /></small>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  data() {
    return {
      stores: [],
    };
  },
  created() {
    axios
      .get('http://localhost:8000/api/app/product')
      .then((response) => {
        this.stores = response.data.data;
      })
      .catch((error) => {
        console.error(error);
      });
  },
  methods: {
    col() {},
  },
};
</script>
