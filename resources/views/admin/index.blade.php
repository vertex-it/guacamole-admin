@extends('admin.layouts.master')

@section('title', 'Admin')

@section('content')
    <div class="content-i">
        <div class="content-box col-lg-12">
            <div class="element-wrapper">
                <div class="element-box col-lg-12">
                    <div class="table-responsive">
                        <div class="controls-above-table">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Najava konsultanata</h5>
                                </div>
                                <div class="col-md-6">
                                    @include ('admin.components.modal', [
                                        'id' => 'add_announcement',
                                        'title' => 'Dodajte najavu konsultanta',
                                        'body' => view('admin.add-announcement-modal', compact('doctors'))
                                    ])
                                    <a 
                                        class="btn btn-small btn-primary pull-right"        
                                        href="#add_announcement" 
                                        data-toggle="modal"
                                    >
                                        Dodajte najavu konsultanta
                                    </a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-lightborder" id="announcementsTable">
                            <thead>
                                <tr>
                                    <th>Fotografija</th>
                                    <th>Konsultant</th>
                                    <th>Vrijeme ordiniranja</th>
                                    <th>Akcija</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($announcements as $announcement)
                                    <tr>
                                        <td>
                                            <img 
                                                loading="lazy" 
                                                src="{{ Storage::url($announcement->doctor->photo) }}" 
                                                alt="{{ $announcement->doctor->photo }} profile photo" 
                                                class="img-fluid" 
                                                style="max-width: 200px;"
                                            >
                                        </td>
                                        <td>
                                            {{ $announcement->doctor->name }}
                                        </td>
                                        <td>
                                            {{ $announcement->description }}
                                        </td>
                                        <td>
                                            <button 
                                                class="btn btn-danger delete-announcement"
                                                data-route="{{ route('admin.announcements.destroy', $announcement) }}"
                                            >
                                                Obrišite
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-i">
        <div class="content-box col-lg-12">
            <div class="element-wrapper">
                <h6 class="element-header">Zakazani pregledi</h6>
                <div class="element-box col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-lightborder" id="appointmentsTable">
                            <thead>
                                <tr>
                                    <th>Ime i prezime</th>
                                    <th>Kontakt</th>
                                    <th>Vrsta pregleda</th>
                                    <th>Datum</th>
                                    <th>Komentar / Dodatno</th>
                                    <th>Zakazano</th>
                                    <th>Akcija</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->full_name }}</td>
                                        <td>{{ $appointment->email_or_phone }}</td>
                                        <td>{{ $appointment->service->name }}</td>
                                        <td>{{ $appointment->date->format('d.m.Y.') }}</td>
                                        <td>{{ $appointment->comment }}</td>
                                        <td>{{ $appointment->created_at->diffForHumans() }}</td>
                                        <td>
                                            <button class="btn btn-danger delete-appointment"
                                                data-route="{{ route('admin.appointments.destroy', $appointment) }}">
                                                Obrišite
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-i">
        <div class="content-box col-lg-12">
            <div class="element-wrapper">
                <h6 class="element-header">Kontakti</h6>
                <div class="element-box col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-lightborder" id="contactsTable">
                            <thead>
                                <tr>
                                    <th>Ime i prezime</th>
                                    <th>Kontakt</th>
                                    <th>Predmet</th>
                                    <th>Poruka</th>
                                    <th>Poslato prije</th>
                                    <th>Akcija</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email_or_phone }}</td>
                                        <td>{{ $contact->subject }}</td>
                                        <td>{{ $contact->message }}</td>
                                        <td>{{ $contact->created_at->diffForHumans() }}</td>
                                        <td>
                                            <button 
                                                class="btn btn-danger delete-contact"
                                                data-route="{{ route('admin.contacts.destroy', $contact) }}"
                                            >
                                                Obrišite
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('external-js')
    <script type="application/javascript">
        $(document).ready(function () {
            announcementsTable = $('#announcementsTable').DataTable({                
                language: dataTableSerbian,
                searchDelay: 500, 
                processing: true, 
            });

            $(document).on('click', '.delete-announcement', function () {;    
                deleteRow($(this), announcementsTable);
            });

            appointmentsTable = $('#appointmentsTable').DataTable({                
                language: dataTableSerbian,
                searchDelay: 500, 
                processing: true, 
            });

            $(document).on('click', '.delete-appointment', function () {;    
                deleteRow($(this), appointmentsTable);
            });

            contactsTable = $('#contactsTable').DataTable({                
                language: dataTableSerbian,
                searchDelay: 500, 
                processing: true, 
            });

            $(document).on('click', '.delete-contact', function () {;    
                deleteRow($(this), contactsTable);
            });
    
            function deleteRow(button, table) {
                $.confirm({
                    icon: 'os-icon os-icon-ui-15',
                    title: 'Da li ste sigurni?',
                    content: 'Ukoliko obrišete element ne možete ga kasnije vratiti!',
                    type: 'red',
                    buttons: {
                        confirm: {
                            text: 'Obrišite',
                            btnClass: 'btn-red',
                            action: function () {
                                $.ajax({
                                    url: button.data('route'),
                                    method: 'DELETE',
                                    success: function () {
                                        table.row(
                                            button.parents('tr')
                                        ).remove().draw();
                                    }
                                });
                            }
                        },
                        cancel: {
                            text: 'Odustanite',
                        }
                    }
                });
            }
        });        
    </script>
@endsection
