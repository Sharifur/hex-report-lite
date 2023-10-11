import "./../../assets/scss/sections/sidebar.scss";
import  logoIcon  from "../../assets/icons/logoIcon.svg";
import  menuIcon  from "../../assets/icons/Menu.svg";
import  DashboardIcon  from "../../assets/icons/dashboard.svg";
import {useState} from "react";
import {Link, useLocation, useSearchParams} from "react-router-dom";
import {useSidebar} from "../../context/SidebarContext.jsx";
import { __ } from "@wordpress/i18n";

export default function Sidebar(){
    const [activeMenuItem, setActiveMenuItem] = useState(location.pathname);
    const { toggleSidebar, isSidebarActive } = useSidebar();

    const [toggleDropdown,setToggleDropdown] = useState(false);

	const {nonce,ajaxUrl,translate_array} = hexReportData;

	const [searchParams, setSearchParams] = useSearchParams();
	searchParams.set("page", "hexreport-page");
	setSearchParams(searchParams);

    const handleMenuItemClick = (path) => {
        setActiveMenuItem(path);
    };
	const windowParams = window.location.search;

    const salesDropdown = ['/sales/by-product','/sales/by-channel','/sales','/sales/by-product-type','/sales/by-locations'];

    return (
        <div className={`sidebarWrapper ${isSidebarActive ? 'active' : ''}`}>
            <div className="logoWrap">
                <a href="#" className="logoBox">
                    <img  className="logoIcon" src={logoIcon} alt="report genix logo icon"/>
                    <span className="logoText">HexReport</span>
                </a>
            </div>
            <ul>
                <li className={`${activeMenuItem === '/' ? 'active' : ''}`}>
                    <Link to={windowParams}>
                        <img src={DashboardIcon} alt="dashboard icon"/>
                        <span className="menuText">{__("Dashboard","hexreport")} </span>
                    </Link>
                </li>
				<li>
					<Link to={"/sales/by-product"}
						  onClick={() => handleMenuItemClick('/sales/by-product')} className={`${activeMenuItem === '/sales/by-product' ? 'active' : ''}`}
					><img src={DashboardIcon} alt="dashboard icon"/><span className="menuText">{__( "Sales by Products", "hexreport" )}</span></Link>
				</li>
				<li>
					<Link to="/sales/by-product-type"
						  onClick={() => handleMenuItemClick('/sales/by-product-type')} className={`${activeMenuItem === '/sales/by-product-type' ? 'active' : ''}`}
					><img src={DashboardIcon} alt="dashboard icon"/><span className="menuText">{__("Sales by Categories","hexreport")}</span></Link>
				</li>
				<li>
					<Link to="/sales/by-locations"
						  onClick={() => handleMenuItemClick('/sales/by-locations')} className={`${activeMenuItem === '/sales/by-locations' ? 'active' : ''}`}
					><img src={DashboardIcon} alt="dashboard icon"/><span className="menuText">{__("Sales by Locations","hexreport")}</span></Link>
				</li>

            </ul>
        </div>
    )
}
