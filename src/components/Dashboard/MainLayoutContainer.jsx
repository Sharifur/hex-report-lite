import Sidebar from "./Sidebar.jsx";
import ContentArea from "./ContentArea.jsx";
import "./../../assets/scss/sections/dashboard.scss";
import Dashboard from "../Page/Dashboard.jsx";
import HelpToastr from "../HelpToastr.jsx";
import PageLayout from "../Layouts/PageLayout.jsx";

export default function MainLayoutContainer({children}){
    return (
		<>
			{children}
			<PageLayout pageTitle="Dashboard">
				<Dashboard/>
			</PageLayout>
		</>

    )
}
