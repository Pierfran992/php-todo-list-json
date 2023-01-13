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
      <!-- titolo -->
      <h1>
        <span id="left_title">ANIME D</span>
        <span id="right_title">A GUARDARE</span>
      </h1>

      <div class="ctn_form">
        <!-- form per inserire un nuovo elemento -->
        <form @submit="createElem">
          <input type="text" name="newElem" v-model="newElem" placeholder="Inserisci un nuovo anime" id="addAnime">
          <input type="submit" value="Crea" id="btn_add">
        </form>
      </div>

      <div class="ctn_list">
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

// regole container principale
.container {
  background-image: url("./assets/img/mixanime.jpg");
  background-size: cover;
  width: 1140px;
  height: 800px;
  margin: 100px auto;

  // regole container secondario
  .sub_container {
    background-color: rgba($color: #000000, $alpha: 0.7);
    width: 100%;
    height: 100%;
    padding: 10px;

    // regole titolo
    h1 {
      opacity: 0.7;
      font-size: 40px;
      width: fit-content;
      height: 50px;
      line-height: 50px;
      margin: 0 auto;

      #left_title,
      #right_title {
        font-family: 'Martian Mono', monospace;
      }

      #left_title {
        color: #000000;
        background-color: #ffffff;
      }

      #right_title {
        color: #ffffff;
        background-color: #000000;
      }
    }

    // regole form
    .ctn_form {
      width: fit-content;
      height: 50px;
      line-height: 50px;
      margin: 20px auto;

      #addAnime {
        background-color: rgba($color: #000000, $alpha: 0.9);
        color: #ffffff;
        font-size: 16px;
        width: 350px;
        height: 40px;
        padding-left: 10px;
        border: none;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;

        &:focus {
          outline: none;
          border: solid 1px #ffffff;
        }
      }

      #btn_add {
        background-color: rgba($color: #000000, $alpha: 0.9);
        color: #ffffff;
        font-size: 16px;
        width: fit-content;
        height: 40px;
        padding: 0 10px;
        border: none;
        border-top-right-radius: 20px;
        border-bottom-right-radius: 20px;
        cursor: pointer;
      }
    }

    // regole lista
    .ctn_list {
      color: #ffffff;
      width: 80%;
      height: calc(100% - 140px);
      margin: 0 auto;
      padding: 10px;
      text-align: start;
      overflow-y: auto;

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
