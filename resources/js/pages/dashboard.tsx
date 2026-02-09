import AppLayout from '@/layouts/app-layout';
import { Head } from '@inertiajs/react';

export default function Dashboard({ auth }: { auth: any }) {
    return (
        <AppLayout>
            <Head title="Dashboard" />

            {}
            <div className="shadow" style={{ backgroundColor: '#111111', borderBottom: '1px solid #333' }}>
                <div className="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h2 className="font-semibold text-xl leading-tight" style={{ color: '#FB9A03', fontFamily: "'Inter', sans-serif" }}>
                        Área do Inscrito - SEMATRON XXII
                    </h2>
                </div>
            </div>

            {}
            <div className="py-12" style={{ backgroundColor: '#000000', minHeight: '100vh' }}>
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    
                    <div className="overflow-hidden shadow-sm sm:rounded-lg" 
                         style={{ backgroundColor: '#111111', border: '1px solid #333' }}>
                        
                        <div className="p-6">
                            <h3 className="text-2xl font-bold mb-4" style={{ color: '#FB9A03' }}>
                                Bem-vindo(a), {auth.user.name}! 🤖
                            </h3>
                            
                            <p className="mb-6 text-gray-300" style={{ fontFamily: "'Inter', sans-serif" }}>
                                Para confirmar sua participação, finalize sua inscrição abaixo.
                            </p>

                            <div className="border-t border-gray-700 my-6"></div>

                            <div className="flex flex-col md:flex-row items-center justify-between gap-4">
                                <div>
                                    <p className="text-gray-400 text-sm">Status Atual:</p>
                                    <span className="font-bold text-yellow-500 text-lg">⚠️ Pagamento Pendente</span>
                                </div>

                                <a href="/pagar" 
                                   className="px-6 py-4 rounded-lg font-bold text-black transition hover:opacity-90 shadow-lg text-center w-full md:w-auto block"
                                   style={{ backgroundColor: '#FB9A03', textDecoration: 'none', fontFamily: "'Inter', sans-serif" }}>
                                    PAGAR INSCRIÇÃO (R$ 15,50) ⚡
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}