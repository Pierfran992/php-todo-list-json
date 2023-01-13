<script>
import axios from 'axios';

const API_URL = "http://localhost/";

export default {
  name: "App",
  data() {
    return {
      newElem: "",

      todoList: [],
    };
  },

  methods: {
    // metodo per richiamare il server in cui sono conservati tutti i dati per stamparli in pagina
    getAllData() {
      axios.get(API_URL + "api.php")
        .then(res => {
          const data = res.data;
          this.todoList = data;
        });
    },

    // metodo per creare e inserire un nuovo elemento nella todoList
    createElem(e) {
      e.preventDefault();

      const newParams = {
        params: {
          'newElem': this.newElem
        }
      };

      axios.get(API_URL + 'create-todo.php', newParams)
        .then(() => {
          this.newElem = "";
          this.getAllData();
        });
    }
  },
  mounted() {

    this.getAllData();
  }
}
</script>

<template>
  <div class="container">
    <div class="sub_container">
      <h1>ANIME DA GUARDARE</h1>

      <div class="ctn_list">
        <!-- form per inserire un nuovo elemento -->
        <form @submit="createElem">
          <label for="newElem">Inserisci un nuovo elemento: </label>
          <input type="text" name="newElem" v-model="newElem">
          <input type="submit" value="Crea">
        </form>
        <!-- lista in cui stampo i dati contenuti nel server -->
        <ul>
          <li v-for="(elem, ind) in todoList" :key="ind">
            {{ elem.text }}
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<style lang="scss">
@use "./styles/general.scss" as *;

.container {
  background-image: url("./assets/img/mixanime.jpg");
  background-size: cover;
  width: 1140px;
  height: 800px;
  margin: 100px auto;

  .sub_container {
    background-color: rgba($color: #000000, $alpha: 0.7);
    width: 100%;
    height: 100%;
    padding: 10px;
    text-align: center;
    overflow-y: auto;

    h1 {
      color: #ffffff;
      font-family: 'Martian Mono', monospace;
      font-size: 40px;
    }

    .ctn_list {
      color: #ffffff;
      width: 80%;
      margin: 0 auto;
      padding: 10px;
      text-align: start;

      ul {
        padding: 0;
        list-style: none;

        li {
          font-size: 20px;
          border-bottom: solid 1px #ffffff;
          padding-bottom: 10px;
          margin-bottom: 20px;
        }
      }
    }
  }

}
</style>
