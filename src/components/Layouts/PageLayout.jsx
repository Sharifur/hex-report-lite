import Sidebar from "../Dashboard/Sidebar.jsx";
import ContentArea from "../Dashboard/ContentArea.jsx";
import HelpToastr from "../HelpToastr.jsx";
import {SidebarProvider} from "../../context/SidebarContext.jsx";

export default function PageLayout({children,pageTitle,helpToastr}){
	const {nonce,ajaxUrl,translate_array} = hexReportData;
    return (
        <SidebarProvider>
            <div className="LayoutContainer">
                <Sidebar />
                <ContentArea pageTitle={pageTitle}>
                    {children}
                    <HelpToastr text={translate_array.needHelpText} anchorText={translate_array.contactUsText} link="https://xgenious.com"/>
                </ContentArea>
            </div>
        </SidebarProvider>
    )
}
