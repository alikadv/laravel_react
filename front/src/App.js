import React, { useState, useEffect } from "react";
import { Layout, Menu, Input, Select, Card } from "antd";

import 'antd/dist/reset.css';
import './App.css';

const { Header, Content } = Layout;
const { Option } = Select;

const API_URL = "https://localhost:8000/posts";

const App = () => {
    const [posts, setPosts] = useState([]);
    const [categories, setCategories] = useState([]);
    const [selectedCategories, setSelectedCategories] = useState([]);
    const [searchText, setSearchText] = useState("");

    useEffect(() => {
        // Fetch posts from backend API
        fetch(`${API_URL}?q=${searchText}&categories=${selectedCategories.join(",")}`)
            .then((response) => response.json())
            .then((data) => setPosts(data))
            .catch((error) => console.error(error));

        // Fetch categories from backend API
        fetch(`${API_URL}/categories`)
            .then((response) => response.json())
            .then((data) => setCategories(data))
            .catch((error) => console.error(error));
    }, [searchText, selectedCategories]);

    const handleCategoryChange = (value) => {
        setSelectedCategories(value);
    };

    const handleSearch = (e) => {
        setSearchText(e.target.value);
    };

    return ( <
        Layout >
        <
        Header >
        <
        Menu theme = "dark"
        mode = "horizontal" >
        <
        Menu.Item key = "1" > Title < /Menu.Item> <
        Menu.Item key = "2" >
        <
        Input placeholder = "Search"
        onChange = { handleSearch }
        /> < /
        Menu.Item > <
        Menu.Item key = "3" >
        <
        Select mode = "multiple"
        placeholder = "Select categories"
        onChange = { handleCategoryChange }
        style = {
            { minWidth: "200px" }
        } > {
            categories.map((category) => ( <
                Option key = { category }
                value = { category } > { category } <
                /Option>
            ))
        } <
        /Select> < /
        Menu.Item > <
        /Menu> < /
        Header > <
        Content style = {
            { padding: "50px" }
        } >
        <
        div className = "site-card-wrapper" > {
            posts.map((post) => ( <
                Card key = { post.id }
                title = { post.title }
                style = {
                    { marginBottom: "20px" }
                } >
                <
                p > Category: { post.category } < /p> <
                p > { post.content } < /p> < /
                Card >
            ))
        } <
        /div> < /
        Content > <
        /Layout>
    );
};

export default App;