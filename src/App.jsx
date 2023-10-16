import MainLayoutContainer from "./components/Dashboard/MainLayoutContainer";
import {BrowserRouter, Route, Routes} from "react-router-dom";
import "./assets/scss/main.scss";
import "line-awesome/dist/line-awesome/css/line-awesome.min.css";
import Dashboard from "./components/Page/Dashboard";
import ByProduct from "./pages/sales/by-product";
import ByCategories from "./pages/sales/by-categories";
import Sidebar from "./components/Dashboard/Sidebar";
import PageLayout from "./components/Layouts/PageLayout";
export default function App() {
	const windowLocation = window.location.pathname;
	// this will remove everything after .php
	let url = windowLocation.replace(/\.php\/.*$/, '.php');
	const windowParams = window.location.search;
	// console.log(url+windowParams)
	return (
		<BrowserRouter basename={url}>
			<div className="reportGenixMainArea">
				<PageLayout pageTitle="Dashboard">
					<Routes>
						<Route element={<Dashboard pageTitle="test" />} path="/"/>
						<Route element={<ByProduct />} path="/sales/by-product"/>
						<Route element={<ByCategories />} path="/sales/by-categories"/>
					</Routes>
				</PageLayout>
			</div>
		</BrowserRouter>
	);
}


