import AuthenticatedLayout from '@/layouts/app-layout';
import { Head, Link } from '@inertiajs/react';

export default function Success({ payment_id, status }: { payment_id: string, status: string }) {
    return (
        <AuthenticatedLayout>
            <Head title="Pagamento Aprovado" />

            <div className="py-12" style={{ backgroundColor: '#000000', minHeight: '100vh' }}>
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-center" 
                         style={{ backgroundColor: '#111111', border: '1px solid #00FF00' }}>
                        
                        <div className="mb-4 text-6xl">🎉</div>
                        
                        <h3 className="text-2xl font-bold mb-2 text-green-500">
                            Pagamento Confirmado!
                        </h3>
                        
                        <p className="text-gray-300 mb-6">
                            Sua inscrição foi realizada com sucesso.
                        </p>

                        <div className="bg-gray-800 p-4 rounded mb-6 inline-block text-left">
                            <p className="text-gray-400 text-sm">ID do Pagamento:</p>
                            <p className="text-white font-mono">{payment_id}</p>
                            <p className="text-gray-400 text-sm mt-2">Status:</p>
                            <p className="text-green-400 font-bold uppercase">{status}</p>
                        </div>

                        <div>
                            <Link href="/dashboard" 
                                  className="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                Voltar ao Dashboard
                            </Link>
                        </div>

                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}